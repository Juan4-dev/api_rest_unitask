<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
    protected $table = "roles";
    protected $primaryKey = 'id_rol';
    protected $fillable=[
        'nombre_rol'
    ];

    public function cliente(){
        return $this->hasOne(cliente::class);
    }

    public function servicio(){
        return $this->hasOne(servicio::class);
    }
}