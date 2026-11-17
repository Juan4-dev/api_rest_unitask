<?php

namespace App\Interfaces;

interface HorarioInterface extends BaseInterface
{
    public function findById(int $id);
    public function findByHoraryType(string $tipoHorario);
    public function findByPeriod(string $periodo);
    public function findByIdentity(int $numeroIdentificacion);
}