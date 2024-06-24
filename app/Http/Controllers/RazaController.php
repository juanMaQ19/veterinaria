<?php

namespace App\Http\Controllers;

use App\Models\Raza;
use Illuminate\Http\Request;

class RazaController extends Controller
{
    function _construct(){
    
        $this->middleware('permission:ver-especialidad|crear-especialidad|editar-especialidad|borrar-especialidad',['only'=>['index']]);
        $this->middleware('permission:crear-especialidad',['only'=>['create','store']]);
        $this->middleware('permission:editar-especialidad',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-especialidad',['only'=>['destroy']]);
    }
    
    public function index()
    {
        $razas = Raza::paginate(5);
        return view('raza.index',compact('razas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('raza.crear');
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
        Raza::create($request->all());
        $notificacion='La raza se creo correctamente.';
        return redirect()->route('raza.index')->with(compact('notificacion'));
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
    public function edit(Raza $raza)
    {
        return view('raza.editar',compact('raza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Raza $raza)
    {
        request()->validate([
            'nombre'=>'required',

        ]);
        $raza->update($request->all());
        $notificacion='La raza se actualizo correctamente';
        return redirect()->route('raza.index')->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Raza $raza)
    {
        $deleteName=$raza->nombre;
        $raza->delete();
        $notificacion='La raza  '. $deleteName.' se elimino correctamente';
        return redirect()->route('raza.index')->with(compact('notificacion'));
    }
}
