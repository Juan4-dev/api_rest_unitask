<?php

namespace App\Interfaces;

interface TurnoInterface extends BaseInterface
{
    public function findByFecha(string $diaTurno);
    public function findByRangoFechas(string $fechaInicio, string $fechaFin);
    public function findConHorasExtras();
    public function findByHorario(int $idHorario);
    public function findByNombre(string $nombreTurno);
    public function findByJornada(string $jornada);
    public function findByEmpleado(int $numeroIdentificacion);
}