<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asistencia extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'asistencias';
    protected $primaryKey = 'id_asistencia';

    protected $fillable = [
        'hora_entrada',
        'hora_salida',
        'estado_validacion',
        'fecha',
        'numero_identificacion',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'numero_identificacion');
    }
}
