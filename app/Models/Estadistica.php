<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estadistica extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'estadisticas';
    protected $primaryKey = 'id_estadistica';

    protected $fillable = [
        'tipo_grafico',
        'id_reporte',
        'id_pago',
        'id_labor',
        'periodo_evaluado',
    ];

    public function reporte()
    {
        return $this->belongsTo(Reporte::class, 'id_reporte');
    }

    public function pago()
    {
        return $this->hasMany(Pago::class, 'id_pago');
    }

    public function labor()
    {
        return $this->hasMany(Servicio::class, 'id_labor');
    }
}