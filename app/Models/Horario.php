<?php

namespace App\Models;
use App\Models\Cita;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $fillable = ['horario'];

    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }
}
