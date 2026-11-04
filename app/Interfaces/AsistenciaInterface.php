<?php

namespace App\Interfaces;

interface AsistenciaInterface extends BaseInterface
{
    public function findByDate(string $fecha);
    public function findByIdentifity(string $numeroIdentificacion);
    public function registerAttendance(array $asistencia);
    public function registerEntry(array $asistenciaData);
    public function registerExit(int $asistencia, string $horaSalida);
}