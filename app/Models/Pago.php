<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pago extends Model
{
    protected $table = "pagos";
    protected $fillabe=[
        "nombre_rol"
    ];

    public function usuario(){
        return $this->hasMany(usuario::class);
    }
}