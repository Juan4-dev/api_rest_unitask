<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asistencia extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'asistencia';
    protected $primaryKey = 'id_asistencia';

    protected $fillable = [
        'hora_entrada',
        'hora_salida',
        'estado_validacion',
        'fecha',
        'numero_identificacion',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'numero_identificacion', 'numero_identificacion');
    }
}