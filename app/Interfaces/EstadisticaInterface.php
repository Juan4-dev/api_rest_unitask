<?php

namespace App\Interfaces;

interface EstadisticaInterface extends BaseInterface
{
    public function findByChartType(string $tipoGrafico);
    public function findByReport(int $reporte);
}