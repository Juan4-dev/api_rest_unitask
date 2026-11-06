<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servicio extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "servicios";
    
    protected $primaryKey = 'id_labor';

    protected $fillable = [
        'nombre_servicio',
        'labor_servicio',
        'horas_labor',
        'cantidad_servicios',
        'id_pago'
    ];
    
    public function pago()
    {
        return $this->belongsTo(Pago::class, 'id_pago');
    }

    public function estadistica()
    {
        return $this->belongsTo(Estadistica::class, 'id_estadistica');
    }

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'placa_vehiculo');
    }
}