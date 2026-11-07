<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pago extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "pagos";
    protected $primaryKey = "id_pago";

    protected $fillable = [
        "total_pago",
        "estado",
        "cantidad",
        "numero_identificacion"
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'numero_identificacion', 'numero_identificacion');
    }
}