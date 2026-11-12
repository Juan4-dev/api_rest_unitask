<?php

namespace App\Repositories;

use App\Models\Turno;
use App\Interfaces\TurnoInterface;

class TurnoRepository extends BaseRepository implements TurnoInterface
{
    public function __construct(Turno $turno)
    {
        parent::__construct($turno);
    }

    public function findByFecha(string $diaTurno)
    {
        return Turno::where('dia_turno', $diaTurno)->get();
    }

    public function findByRangoFechas(string $fechaInicio, string $fechaFin)
    {
        return Turno::whereBetween('dia_turno', [$fechaInicio, $fechaFin])->get();
    }

    public function findConHorasExtras()
    {
        return Turno::where('horas_extras', '>', 0)->get();
    }
}