<?php

namespace App\Http\Controllers;

use App\Models\Especie;
use Illuminate\Http\Request;

class EspecieController extends Controller
{
    function _construct(){
    
        $this->middleware('permission:ver-especialidad|crear-especialidad|editar-especialidad|borrar-especialidad',['only'=>['index']]);
        $this->middleware('permission:crear-especialidad',['only'=>['create','store']]);
        $this->middleware('permission:editar-especialidad',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-especialidad',['only'=>['destroy']]);
    }
    
    public function index()
    {
        $especies = Especie::paginate(5);
        return view('especie.index',compact('especies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('especie.crear');
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
            
        ]);
        Especie::create($request->all());
        $notificacion='La especie se creo correctamente.';
        return redirect()->route('especie.index')->with(compact('notificacion'));
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
    public function edit(Especie $especie)
    {
        return view('especie.editar',compact('especie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Especie $especie)
    {
        request()->validate([
            'nombre'=>'required',
            

        ]);
        $especie->update($request->all());
        $notificacion='La especie se actualizo correctamente';
        return redirect()->route('especie.index')->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Especie $especie)
    {
        $deleteName=$especie->nombre;
        $especie->delete();
        $notificacion='La especie  '. $deleteName.' se elimino correctamente';
        return redirect()->route('especie.index')->with(compact('notificacion'));
    }
}
