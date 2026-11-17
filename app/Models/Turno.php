<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turno extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'turnos';
    protected $primaryKey = 'id_turno';

    protected $fillable = [
        'nombre_turno',
        'jornada',
        'dia_turno',
        'inicio_turno',
        'fin_turno',
        'horas_extras',
        'id_horario',
    ];

    public function horario(): BelongsTo
    {
        return $this->belongsTo(Horario::class, 'id_horario', 'id_horario');
    }
}