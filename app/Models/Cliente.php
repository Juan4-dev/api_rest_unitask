<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'clientes';

    // PK personalizada: cédula (entero, no autoincrementable)
    protected $primaryKey = 'cedula_cliente';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'cedula_cliente',
        'nombre_cliente',
        'apellido_cliente',
        'correo_cliente',
        'placa_vehiculo',
    ];

    
    public function vehiculo(): BelongsTo
    {
        return $this->belongsTo(Vehiculo::class, 'placa_vehiculo');
    }
}