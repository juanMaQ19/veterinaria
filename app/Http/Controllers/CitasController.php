<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Propietario;
use App\Models\Horario;
use Carbon\Carbon;

use Illuminate\Http\Request;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchQuery = $request->input('query');
        
        if ($searchQuery) {
            $propietario = Propietario::where('CI', 'LIKE', "%{$searchQuery}%")->first();
            
            if ($propietario) {
                $pacientesIds = $propietario->pacientes()->pluck('pacientes.id');
                $citas = Cita::with('medicos', 'pacientes', 'horarios')
                    ->whereHas('pacientes', function ($query) use ($pacientesIds) {
                        $query->whereIn('pacientes.id', $pacientesIds);
                    })
                    ->paginate(5);
            } else {
                $citas = collect(); // Si no se encuentra el propietario, asignamos una colección vacía
            }
        } else {
            $citas = Cita::with('medicos', 'pacientes', 'horarios')->paginate(5);
        }
        
        return view('citas.index', compact('citas'));
    }
  
    

    public function search(Request $request)
    {
        $searchQuery = $request->input('query');
        
        $propietario = Propietario::where('CI', 'LIKE', "%{$searchQuery}%")->first();
        
        if ($propietario) {
            $pacientes = $propietario->pacientes()->get();
        } else {
            $pacientes = collect(); // Si no se encuentra el propietario, asignamos una colección vacía
        }
        
        return view('citas.pacientes_result', compact('pacientes'));
    }
    
    

    public function calendar()
    {
        $citas = Cita::with('pacientes')->with('horarios')->get();
    
        $events = [];
        foreach ($citas as $cita) {
            foreach ($cita->horarios as $horario) {
                $events[] = [
                    'title' => $cita->estado,
                    'start' => $cita->fecha,
                    'paciente' => $cita->pacientes->pluck('nombre')->implode(', '),
                    'medico' => $cita->medicos->pluck('nombre')->implode(', '),
                    'horario' => $horario->horario,

                ];
            }
        }
    
        return view('citas.calendar', compact('events'));
    }
    
    
    
        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        
        // Arreglo de horarios disponibles
        $horariosDisponibles = [
            '08:00 - 09:00',
            '09:00 - 10:00',
            '10:00 - 11:00',
            '11:00 - 12:00',
            '12:00 - 13:00',
            '15:00 - 16:00',
            '16:00 - 17:00',
            '17:00 - 18:00',
            '18:00 - 19:00',
            
        ];
        
        return view('citas.crear', compact('medicos', 'pacientes', 'horariosDisponibles'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'fecha' => 'required',
        'estado' => 'required',
        'horario' => 'required|array',
        'horario.*' => 'required|string',
        'pacientes' => 'required|array',
    ]);

    // Validar disponibilidad de la cita
    $fecha = $request->input('fecha');
    $horariosSeleccionados = $request->input('horario');

    if ($this->citaExists($fecha, $horariosSeleccionados)) {
        return redirect()->back()->withErrors(['fecha' => 'Ya existe una cita con la misma fecha y horario seleccionados.'])->withInput();
    }

    // Crear la instancia de Cita
    $cita = Cita::create([
        'fecha' => $fecha,
        'estado' => $request->input('estado'),
    ]);

    // Agregar la relación con los pacientes seleccionados
    $cita->pacientes()->attach($request->input('pacientes'));

    // Crear los horarios de la cita
    foreach ($horariosSeleccionados as $horario) {
        $cita->horarios()->create([
            'horario' => $horario,
        ]);
    }

    // Asociar los médicos seleccionados
    $cita->medicos()->attach($request->input('medicos'));

    $notificacion = 'La cita se agregó correctamente.';
    return redirect()->route('citas.index')->with(compact('notificacion'));
}

private function citaExists($fecha, $horarios)
{
    $citas = Cita::where('fecha', $fecha)->get();

    foreach ($citas as $cita) {
        foreach ($cita->horarios as $horario) {
            if (in_array($horario->horario, $horarios)) {
                return true;
            }
        }
    }

    return false;
}

    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit(Cita $cita)
    {
        $medicos = Medico::all();
        $pacientes = Paciente::all();
    
        // Obtener los IDs de los médicos y pacientes relacionados con la cita
        $medicos_ids = $cita->medicos->pluck('id')->all();
        $pacientes_ids = $cita->pacientes->pluck('id')->all();
    
        // Obtener los horarios disponibles para la fecha de la cita
        $horariosDisponibles = $this->getHorariosDisponibles($cita->fecha);
    
        // Obtener los horarios asignados previamente
        $horariosAsignados = $cita->horarios->pluck('horario')->all();
    
        return view('citas.editar', compact('cita', 'medicos', 'pacientes', 'medicos_ids', 'pacientes_ids', 'horariosDisponibles', 'horariosAsignados'));
    }
    
    


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cita $cita)
{
    $request->validate([
        'fecha' => 'required',
        'estado' => 'required',
    ]);

    // Verificar si se han realizado cambios en los horarios
    $horariosSeleccionados = $request->input('horario');
    $horariosExistentes = $cita->horarios->pluck('horario')->all();

    if (empty($horariosSeleccionados)) {
        $horariosSeleccionados = $horariosExistentes;
    } else {
        // Validar disponibilidad de los nuevos horarios seleccionados
        $fecha = $request->input('fecha');
        $horariosDisponibles = $this->getHorariosDisponibles($fecha);

        foreach ($horariosSeleccionados as $horario) {
            if (!in_array($horario, $horariosDisponibles)) {
                return redirect()->back()->withErrors(['horario' => 'El horario seleccionado no está disponible para la fecha seleccionada.'])->withInput();
            }
        }
    }

    // Actualizar la cita
    $cita->fecha = $request->input('fecha');
    $cita->estado = $request->input('estado');
    $cita->save();

    // Actualizar las relaciones de la cita (medicos, pacientes, horarios)

    // Actualizar los pacientes relacionados con la cita
    $cita->pacientes()->sync($request->input('pacientes'));

    // Actualizar los horarios
    $cita->horarios()->delete();

    // Agregar los nuevos horarios seleccionados
    foreach ($horariosSeleccionados as $horario) {
        $cita->horarios()->create([
            'horario' => $horario,
        ]);
    }

    // Actualizar los medicos relacionados con la cita
    $cita->medicos()->sync($request->input('medicos'));

    $notificacion = 'La cita se actualizó correctamente.';
    return redirect()->route('citas.index')->with(compact('notificacion'));
}

   
private function getHorariosDisponibles($fecha)
{
    // Obtener todas las citas para la fecha seleccionada
    $citas = Cita::where('fecha', $fecha)->get();

    if ($citas->isEmpty()) {
        // Si no hay citas para la fecha seleccionada, todos los horarios están disponibles
        $horariosTodos = [
            '08:00 - 09:00',
            '09:00 - 10:00',
            '10:00 - 11:00',
            '11:00 - 12:00',
            '12:00 - 13:00',
            '15:00 - 16:00',
            '16:00 - 17:00',
            '17:00 - 18:00',
            '18:00 - 19:00',
        ];

        return $horariosTodos;
    }

    // Obtener todos los horarios de las citas para la fecha seleccionada
    $horariosOcupados = $citas->flatMap(function ($cita) {
        return $cita->horarios->pluck('horario');
    });

    // Todos los horarios disponibles
    $horariosTodos = [
        '08:00 - 09:00',
        '09:00 - 10:00',
        '10:00 - 11:00',
        '11:00 - 12:00',
        '12:00 - 13:00',
        '15:00 - 16:00',
        '16:00 - 17:00',
        '17:00 - 18:00',
        '18:00 - 19:00',
    ];

    // Horarios disponibles (diferencia entre todos los horarios y los horarios ocupados)
    $horariosDisponibles = array_diff($horariosTodos, $horariosOcupados->toArray());

    return $horariosDisponibles;
}
public function destroy(Cita $cita)
{
    $cita->delete();

    $notificacion = 'La cita se eliminó correctamente.';
    return redirect()->route('citas.index')->with(compact('notificacion'));
}



}
