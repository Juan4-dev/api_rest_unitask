<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reporte extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'reportes';
    
    // Llave primaria personalizada definida en la migración
    protected $primaryKey = 'id_reporte';

    protected $fillable = [
        'tipo_fallas',
        'cantidad_fallas',
        'numero_identificacion',
    ];

    /**
     * Relación: Un reporte pertenece a un empleado.
     */
    //public function empleado()
    //{
      //  return $this->belongsTo(Empleado::class, 'numero_identificacion', 'numero_identificacion');
    //}
}