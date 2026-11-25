<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Usuario extends Authenticatable implements JWTSubject
{
    use HasFactory, SoftDeletes;

    protected $table = 'usuarios';
    protected $primaryKey = 'numero_identificacion';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'numero_identificacion',
        'nombre_empleado',
        'apellido_empleado',
        'telefono_empleado',
        'correo_empleado',
        'usuario',
        'contraseña',
        'id_rol',
    ];

    protected $hidden = [
        'contraseña',
    ];

    public function getAuthPassword(): string
    {
        return $this->contraseña;
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }

    public function rol(): BelongsTo
    {
        return $this->belongsTo(Rol::class, 'id_rol', 'id_rol');
    }

    public function servicios(): HasMany
    {
        return $this->hasMany(Servicio::class, 'numero_identificacion', 'numero_identificacion');
    }

    public function pagos(): HasMany
    {
        return $this->hasMany(Pago::class, 'numero_identificacion', 'numero_identificacion');
    }

    public function asistencias(): HasMany
    {
        return $this->hasMany(Asistencia::class, 'numero_identificacion', 'numero_identificacion');
    }

    public function horarios(): HasMany
    {
        return $this->hasMany(Horario::class, 'numero_identificacion', 'numero_identificacion');
    }
}