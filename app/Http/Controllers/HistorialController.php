<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Medico;
use App\Models\Paciente;
use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Barryvdh\DomPDF\Facade\Pdf;


class HistorialController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $pacientes = Paciente::whereHas('propietario', function ($queryBuilder) use ($query) {
            $queryBuilder->where('ci', 'LIKE', "%$query%");
        })->get();

        // Obtener los historiales asociados a los pacientes encontrados
        $historiales = Historial::whereIn('paciente_id', $pacientes->pluck('id'))->paginate(5);

        return view('historial.index', compact('historiales'));
    }



   

    public function index(Request $request)
    {
        $query = $request->input('query');
    
        if ($query) {
            $historiales = Historial::whereHas('pacientes', function ($queryBuilder) use ($query) {
                $queryBuilder->where('nombre', 'LIKE', "%$query%")
                    ->orWhere('apellido', 'LIKE', "%$query%");
            })->paginate(5);
            $pacienteNoEncontrado = $historiales->isEmpty();
        } else {
            $historiales = Historial::paginate(5);
            $pacienteNoEncontrado = false;
        }
    
        return view('historial.index', compact('historiales', 'pacienteNoEncontrado'));
    }
    public function pdf(){
        $historiales=Historial::all();
        $pdf = Pdf::loadView('historial.pdf', compact('historials'));
        return $pdf->stream();
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes=Paciente::all();
        $medicos=Medico::all();
        return view('historial.crear',compact('pacientes','medicos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'fechaR'=>'required',
            'temperatura'=>'required', 
            'peso'=>'required', 
            'diagnostico'=>'required', 
            'diet'=>'required', 
            'analisis'=>'required', 
            'tratamiento'=>'required', 
            
        ]);
        $historiales=Historial::create($request->all());
        $notificacion='El historial se registro correctamente.';
        $historiales->pacientes()->attach($request->input('pacientes')); 
        $historiales->medicos()->attach($request->input('medicos')); 
        return redirect()->route('historial.index')->with(compact('notificacion'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function edit(Historial $historial)
{
    $pacientes = Paciente::all();
    $medicos = Medico::all();
    $paciente_ids = $historial->pacientes()->pluck('pacientes.id');
    $medico_ids = $historial->medicos()->pluck('medicos.id');
    return view('historial.editar', compact('historial', 'pacientes', 'medicos', 'paciente_ids', 'medico_ids'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Historial $historial)
    {
        request()->validate([
            'fechaR'=>'required',
            'temperatura'=>'required', 
            'peso'=>'required', 
            'diagnostico'=>'required', 
            'diet'=>'required', 
            'analisis'=>'required', 
            'tratamiento'=>'required', 
            
        ]);
        $historial->update($request->all());
        $historial->pacientes()->sync($request->input('pacientes'));
        $historial->medicos()->sync($request->input('medicos'));
        $notificacion='El paciente se actualizo correctamente';
        return redirect()->route('historial.index')->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Historial $historial)
    {
        
        $deleteName=$historial->fechaR;
        $historial->delete();
        $notificacion='El historial  '. $deleteName.' se elimino correctamente';
        return redirect()->route('historial.index')->with(compact('notificacion'));
    }
}
