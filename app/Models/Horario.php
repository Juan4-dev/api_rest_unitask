<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Horario extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'horarios';
    
    // Llave primaria personalizada según la migración de horarios[cite: 4]
    protected $primaryKey = 'id_horario';

    protected $fillable = [
        'tipo_horario',
        'periodo',
        'nombre_turno',
        'fecha_turno',
        'jornada',
    ];

    /**
     * Relaciones con otras tablas (si aplica según tu diagrama ERD)
     * Por ejemplo, si un horario tiene relación con empleados o asistencias, 
     * puedes definirlas aquí usando hasMany o belongsTo.
     */
}