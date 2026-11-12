<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Horario extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'horarios';
    
    protected $primaryKey = 'id_horario';

    protected $fillable = [
        'tipo_horario',
        'periodo_labor',
        'nombre_turno',
        'fecha_turno',
        'jornada',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'numero_identificacion');
    }

    public function turnos()
    {
        return $this->hasMany(Turno::class, 'id_horario', 'id_horario');
    }
}