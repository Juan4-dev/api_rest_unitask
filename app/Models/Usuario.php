<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'usuario',
        'contraseña',
        'id_rol',
        'comerse_esta',
        'numero_identificacion',
    ];
    
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }
}