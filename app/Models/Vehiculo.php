<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehiculo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'vehiculo';

    // PK personalizada: placa (texto, no autoincrementable)
    protected $primaryKey = 'placa_vehiculo';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'placa_vehiculo',
        'tipo_vehiculo',
        'id_labor',
    ];

    
    public function servicio(): BelongsTo
    {
        return $this->belongsTo(Servicio::class, 'id_labor', 'id_labor');
    }

    
    public function clientes(): HasMany
    {
        return $this->hasMany(Cliente::class, 'placa_vehiculo', 'placa_vehiculo');
    }
}
