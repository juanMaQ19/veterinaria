<?php

namespace App\Http\Controllers;

use App\Models\Especie;
use App\Models\Paciente;
use App\Models\Propietario;
use App\Models\Raza;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    function _construct(){
    
        $this->middleware('permission:ver-especialidad|crear-especialidad|editar-especialidad|borrar-especialidad',['only'=>['index']]);
        $this->middleware('permission:crear-especialidad',['only'=>['create','store']]);
        $this->middleware('permission:editar-especialidad',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-especialidad',['only'=>['destroy']]);
    }
    public function index()
    {
        $pacientes=Paciente::paginate(5);
        return view('pacientes.index',compact('pacientes'));
    }
    public function search(Request $request)
    {
        $searchQuery = $request->input('query');
        
        $pacientes = Paciente::whereHas('propietarios', function ($query) use ($searchQuery) {
            $query->where('CI', 'LIKE', "%{$searchQuery}%");
        })->paginate(5);
        
        return view('pacientes.index', compact('pacientes'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
    {
        $especies=Especie::all();
        $razas=Raza::all();
        $propietarios=Propietario::all();
        return view('pacientes.crear',compact('especies','razas','propietarios'));
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
            'nombre'=>'required',
            'apellido'=>'required', 
            'color'=>'required', 
            'edad'=>'required', 
            'fechaN'=>'required', 
            'vacunas'=>'required', 
            'alergias'=>'required', 
        ]);
        $paciente=Paciente::create($request->all());
        $notificacion='El paciente se registro correctamente.';
        $paciente->propietarios()->attach($request->input('propietarios')); 
        $paciente->especies()->attach($request->input('especies')); 
        $paciente->razas()->attach($request->input('razas')); 
        return redirect()->route('pacientes.index')->with(compact('notificacion'));
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
    public function edit(Paciente $paciente)
    {
        $especies = Especie::all();
        $razas = Raza::all();
        $propietarios = Propietario::all();
        $propietarios_ids = $paciente->propietarios()->pluck('propietarios.id');
        $propietarios_carnet = $paciente->propietarios()->pluck('propietarios.CI')->toArray();
        $especies_ids = $paciente->especies()->pluck('especies.id');
        $razas_ids = $paciente->razas()->pluck('razas.id');
        
        return view('pacientes.editar', compact('paciente', 'especies', 'razas', 'propietarios', 'propietarios_ids', 'propietarios_carnet', 'especies_ids', 'razas_ids'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        request()->validate([
            'nombre'=>'required',
            'apellido'=>'required', 
            'color'=>'required', 
            'edad'=>'required', 
            'fechaN'=>'required', 
            'vacunas'=>'required', 
            'alergias'=>'required', 

        ]);
        $paciente->update($request->all());
        $paciente->propietarios()->sync($request->input('propietarios'));
        $paciente->especies()->sync($request->input('especies'));
        $paciente->razas()->sync($request->input('razas'));
        $notificacion='El paciente se actualizo correctamente';
        return redirect()->route('pacientes.index')->with(compact('notificacion'));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
           $deleteName=$paciente->nombre;
        $paciente->delete();
        $notificacion='El paciente  '. $deleteName.' se elimino correctamente';
        return redirect()->route('pacientes.index')->with(compact('notificacion'));
    }
}
