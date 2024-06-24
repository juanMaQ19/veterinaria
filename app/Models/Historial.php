<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;
use App\Models\Medico;

class Historial extends Model
{
    use HasFactory;
    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class);
    }

    public function medicos()
    {
        return $this->belongsToMany(Medico::class);
    }
    protected $fillable = ['fechaR', 'temperatura','peso','diagnostico','diet','analisis','tratamiento'];
}
