<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
  public function especialidades(){
    return $this->belongsToMany(Especialidades::class)->withTimestamps();
  }
  public function citas()
    {
        return $this->belongsToMany(Cita::class);
    }

    protected $fillable=['nombre','apellido','CI','telefono','direccion','sexo'];
}

