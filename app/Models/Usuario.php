<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
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
        'id_rol'
    ];

    public function servicios()
    {
        return $this->hasMany(Servicio::class);
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }

    public function reportes()
    {
        return $this->hasMany(Reporte::class);
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class);  
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }
}