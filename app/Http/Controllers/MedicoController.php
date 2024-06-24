<?php

namespace App\Http\Controllers;

use App\Models\Especialidades;
use App\Models\Medico;

use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function index(Request $request)
    {
        $query = $request->input('query');
    
        if ($query) {
            $medicos = Medico::where('nombre', 'LIKE', "%$query%")
                ->orWhere('CI', 'LIKE', "%$query%")
                ->orWhereHas('especialidades', function ($queryBuilder) use ($query) {
                    $queryBuilder->where('nombre', 'LIKE', "%$query%");
                })->paginate(5);
            $medicoNoEncontrado = $medicos->isEmpty();
        } else {
            $medicos = Medico::paginate(5);
            $medicoNoEncontrado = false;
        }
    
        return view('medicos.index', compact('medicos', 'medicoNoEncontrado'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {$especialidades=Especialidades::all();

        return view('medicos.crear', compact('especialidades'));
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
            'CI'=>'required',
            'telefono'=>'required',
            'direccion'=>'required',
            'sexo'=>'required',
            
        ]);
       $medico= Medico::create($request->all());
        $notificacion='El medico se agrego correctamente.';
        $medico->especialidades()->attach($request->input('especialidades')); 
        return redirect()->route('medicos.index')->with(compact('notificacion'));
       
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
    public function edit(Medico $medico)
    {
        
        $especialidades=Especialidades::all();
        $especialidad_ids= $medico->especialidades()->pluck('especialidades.id');
        return view('medicos.editar',compact('medico','especialidades','especialidad_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medico $medico)
    {
        request()->validate([
            'nombre'=>'required',
            'apellido'=>'required',
            'CI'=>'required',
            'telefono'=>'required',
            'direccion'=>'required',
            'sexo'=>'required',
            

        ]);
        $medico->update($request->all());
        $medico->especialidades()->sync($request->input('especialidades'));
        $notificacion='El medico se actualizo correctamente';
        return redirect()->route('medicos.index')->with(compact('notificacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medico $medico)
    {
        $deleteName=$medico->nombre;
        $medico->delete();
        $notificacion='El medico  '. $deleteName.' se elimino correctamente';
        return redirect()->route('medicos.index')->with(compact('notificacion'));
    }
}
