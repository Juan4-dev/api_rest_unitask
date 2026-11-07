<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\User;

class Pago extends Model
{
    protected $table = "pagos";
    protected $fillabe=[
        "total_pago"
    ];

    public function usuario(){
        return $this->hasMany(usuario::class);
    }
}