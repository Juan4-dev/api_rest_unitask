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
        'periodo',
        'nombre_turno',
        'fecha_turno',
        'jornada',
    ];

    public function empleado(){

    return $this->belongsTo(Empleado::class, 'numero_identificacion');
    }

     
}