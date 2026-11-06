<?php

namespace App\Repositories;

use App\Interfaces\ReporteInterface;
use App\Models\Reporte;

class ReporteRepository extends BaseRepository implements ReporteInterface
{
    public function __construct(Reporte $reporte)
    {
        parent::__construct($reporte);
    }

    public function findByFailureType(string $tipo_fallas)
    {
        return $this->model->where('tipo_fallas', $tipo_fallas)->get();
    }

    public function getByFailureCount(int $cantidad_fallas)
    {
        return $this->model->where('cantidad_fallas', $cantidad_fallas)->get();
    }

    public function getReportByEmployee(int $numero_identificacion)
    {
        return $this->model->where('numero_identificacion', $numero_identificacion)->get();
    }
}