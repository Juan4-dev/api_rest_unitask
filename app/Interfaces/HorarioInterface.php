<?php

namespace App\Interfaces;

interface HorarioInterface extends BaseInterface
{

public function findByHoraryType(string $tipo_horario);

public function getByTimeJob(int $periodo_labor);

public function findByNameShift(string $nombre_turno);

public function findByDateShift(int $fecha_turno);

public function findByWorkDay(string $jornada);

}