<?php

namespace App\Interfaces;

interface EstadisticaInterface extends BaseInterface
{
    public function findByChartType(string $tipoGrafico);
    public function getByDateRange(string $fechaInicio, string $fechaFin);
    public function findByChartAndPeriod(string $tipoGrafico, string $fechaInicio, string $fechaFin);
    public function findByReport(int $reporte);
}