<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'clientes';
    protected $primaryKey = 'cedula_cliente';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'cedula_cliente',
        'nombre_cliente',
        'apellido_cliente',
        'correo_cliente',
    ];

    public function vehiculos(): HasMany
    {
        return $this->hasMany(Vehiculo::class, 'cedula_cliente', 'cedula_cliente');
    }
}