<?php

namespace App\Interfaces;

interface AsistenciaInterface extends BaseInterface
{
    public function findByDate(string $fecha);
    public function findByDateRange(string $fechaInicio, string $fechaFin);
    public function findByIdentity(int $numeroIdentificacion);
    public function findByStatus(string $estadoValidacion);
    public function registerEntry(array $asistencia);
    public function registerExit(int $idAsistencia, string $horaSalida);
}