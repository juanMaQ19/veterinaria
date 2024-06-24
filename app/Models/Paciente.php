<?php

namespace App\Models;
use App\Models\Medico;
use App\Models\Cita;
use App\Models\Propietario;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $fillable=['nombre','apellido','color','edad','fechaN','vacunas','alergias'];
    public function citas()
    {
        return $this->belongsToMany(Cita::class);
    }
    public function especies(){
        return $this->belongsToMany(Especie::class);
      }
      public function razas(){
        return $this->belongsToMany(Raza::class);
      }
      public function propietarios()
{
    return $this->belongsToMany(Propietario::class, 'paciente_propietario', 'paciente_id', 'propietario_id')->withTimestamps();
}

}


