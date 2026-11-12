<?php

namespace App\Interfaces;

interface TurnoInterface extends BaseInterface
{
    public function findByFecha(string $diaTurno);
    public function findByRangoFechas(string $fechaInicio, string $fechaFin);
    public function findConHorasExtras();
}