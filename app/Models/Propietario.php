<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    use HasFactory;
   
 
    protected $fillable=['CI','nombre','apellido','tel1','tel2','direccion','sexo'];

    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class, 'paciente_propietario', 'propietario_id', 'paciente_id')->withTimestamps();
    }
    

}


