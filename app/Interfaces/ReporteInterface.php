<?php

namespace App\Interfaces;


interface ReporteInterface extends BaseInterface
{
    public function findByFailureType(string $tipo_fallas);
    public function getByFailureCount(int $cantidad_fallas);
    public function getReportByEmployee(int $numero_identificacion);
}