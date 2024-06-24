<?php

namespace App\Models;
use App\Models\Paciente;
use App\Models\Medico;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cita extends Model
{
    use HasFactory;

    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class, 'cita_paciente', 'cita_id', 'paciente_id');
    }
    

    public function medicos()
    {
        return $this->belongsToMany(Medico::class);
    }

    protected $fillable = ['fecha', 'estado'];

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }
    
    
    
}
