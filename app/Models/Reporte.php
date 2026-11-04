<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reporte extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'reportes';
    
    protected $primaryKey = 'id_reporte';

    protected $fillable = [
        'tipo_fallas',
        'cantidad_fallas',
        'numero_identificacion',
    ];

    
    public function empleado()
    {
      return $this->belongsTo(Empleado::class, 'numero_identificacion');
    }
}