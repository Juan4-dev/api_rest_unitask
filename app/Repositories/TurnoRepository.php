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
        return $this->model->where('dia_turno', $diaTurno)->get();
    }

    public function findByRangoFechas(string $fechaInicio, string $fechaFin)
    {
        return $this->model->whereBetween('dia_turno', [$fechaInicio, $fechaFin])->get();
    }

    public function findConHorasExtras()
    {
        return $this->model->where('horas_extras', '>', 0)->get();
    }

    public function findByHorario(int $idHorario)
    {
        return $this->model->where('id_horario', $idHorario)->get();
    }

    public function findByNombre(string $nombreTurno)
    {
        return $this->model->where('nombre_turno', $nombreTurno)->get();
    }

    public function findByJornada(string $jornada)
    {
        return $this->model->where('jornada', $jornada)->get();
    }

    public function findByEmpleado(int $numeroIdentificacion)
    {
        return $this->model->whereHas('horario', function ($query) use ($numeroIdentificacion) {
            $query->where('numero_identificacion', $numeroIdentificacion);
        })->get();
    }
}