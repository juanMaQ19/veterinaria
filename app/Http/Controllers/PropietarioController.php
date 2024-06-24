<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propietarios = Propietario::paginate(5);
        return view('propietarios.index',compact('propietarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('propietarios.crear');
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
            'CI'=>'required',
            'nombre'=>'required',
            'apellido'=>'required',
            'tel1'=>'required',
            'tel2'=>'required',
            'direccion'=>'required',
            'sexo'=>'required', 
        ]);
        Propietario::create($request->all());
        $notificacion='El propietario se agrego correctamente.';
        return redirect()->route('propietarios.index')->with(compact('notificacion'));
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
    public function edit(Propietario $propietario)
    {
        return view('propietarios.editar',compact('propietario'));
    }
    public function search(Request $request)
{
    $searchQuery = $request->input('query');
    
    $propietarios = Propietario::where('CI', 'LIKE', "%{$searchQuery}%")->paginate(5);
    
    return view('propietarios.index', compact('propietarios'));
}

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propietario $propietario)
    {
        request()->validate([
            'CI'=>'required',
            'nombre'=>'required',
            'apellido'=>'required',
            'tel1'=>'required',
            'tel2'=>'required',
            'direccion'=>'required',
            'sexo'=>'required',
            

        ]);
        $propietario->update($request->all());
        $notificacion='El propietario se actualizo correctamente';
        return redirect()->route('propietarios.index')->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propietario $propietario)
    {
        $deleteName=$propietario->nombre;
        $propietario->delete();
        $notificacion='El propietario  '. $deleteName.' se elimino correctamente';
        return redirect()->route('propietarios.index')->with(compact('notificacion'));
    }
}
