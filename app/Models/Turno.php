<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turno extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'turnos';
    protected $primaryKey = 'id_turno';

    protected $fillable = [
        'dia_turno',
        'hora_inicio',
        'hora_fin',
        'horas_extras',
        'numero_identificacion',
        'id_horario',
    ];

    // Relación con el usuario/empleado
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'numero_identificacion', 'numero_identificacion');
    }

    // Relación con el horario
    public function horario()
    {
        return $this->belongsTo(Horario::class, 'id_horario', 'id_horario');
    }
}