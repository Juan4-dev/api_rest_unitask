<?php

namespace App\Repositories;
use App\Models\Estadistica;

class EstadisticaRepository extends BaseRepository implements EstadisticaInterface
{
    public function __construct(Estadistica $estadistica)
    {
        parent::__construct($estadistica);
    }

    public function findByChartType(string $tipoGrafico)
    {
        return $this->model->where("tipo_grafico", $tipoGrafico)->get();
    }

    public function getByDateRange(string $fechaInicio, string $fechaFin)
    {
        return $this->model->whereBetween("fecha", [$fechaInicio, $fechaFin])->get();
    }

    public function findByChartAndPeriod(string $tipoGrafico, string $fechaInicio, string $fechaFin)
    {
        return $this->model->where("tipo_grafico", $tipoGrafico)
                           ->whereBetween("fecha", [$fechaInicio, $fechaFin])
                           ->get();
    }

    public function findByReport(int $reporte)
    {
        return $this->model->where("reporte_id", $reporte)->get();
    }
}