<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidades;

class EspecialidadController extends Controller
{
    function _construct(){
    
        $this->middleware('permission:ver-especialidad|crear-especialidad|editar-especialidad|borrar-especialidad',['only'=>['index']]);
        $this->middleware('permission:crear-especialidad',['only'=>['create','store']]);
        $this->middleware('permission:editar-especialidad',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-especialidad',['only'=>['destroy']]);
    }
    public function index()
    {
        $especialidades=Especialidades::paginate(5);
        return view('especialidad.index',compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('especialidad.crear');
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
            'descripcion'=>'required', 
        ]);
        Especialidades::create($request->all());
        $notificacion='La especialidad se creo correctamente.';
        return redirect()->route('especialidad.index')->with(compact('notificacion'));
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
    public function edit(Especialidades $especialidad)
    {
        
        return view('especialidad.editar',compact('especialidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Especialidades $especialidad)
    {
        request()->validate([
            'nombre'=>'required',
            'descripcion'=>'required', 

        ]);
        $especialidad->update($request->all());
        $notificacion='La especialidad se actualizo correctamente';
        return redirect()->route('especialidad.index')->with(compact('notificacion'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Especialidades $especialidad)
    {
        $deleteName=$especialidad->nombre;
        $especialidad->delete();
        $notificacion='La especialidad  '. $deleteName.' se elimino correctamente';
        return redirect()->route('especialidad.index')->with(compact('notificacion'));
    }
}
