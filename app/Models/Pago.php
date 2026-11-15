<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pagos';
    protected $primaryKey = 'id_pago';

    protected $fillable = [
        'total_pago',
        'cantidad',
        'estado',
        'metodo_pago',
        'fecha_pago',
        'numero_identificacion',
        'placa_vehiculo',
        'id_servicio',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'numero_identificacion', 'numero_identificacion');
    }

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'placa_vehiculo', 'placa_vehiculo');
    }

    // Relación opcional con el servicio
    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_labor', 'id_labor');
    }
}