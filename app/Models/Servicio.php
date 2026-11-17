<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servicio extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'servicios';
    protected $primaryKey = 'id_labor';

    protected $fillable = [
        'nombre_servicio',
        'labor_servicio',
        'horas_labor',
        'cantidad_servicios',
        'numero_identificacion',
        'placa_vehiculo',
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'numero_identificacion', 'numero_identificacion');
    }

    public function vehiculo(): BelongsTo
    {
        return $this->belongsTo(Vehiculo::class, 'placa_vehiculo', 'placa_vehiculo');
    }

    public function pagos(): HasMany
    {
        return $this->hasMany(Pago::class, 'id_labor', 'id_labor');
    }
}