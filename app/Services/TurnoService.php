<?php

namespace App\Services;

use App\Interfaces\TurnoInterface;

class TurnoService
{
    public function __construct(protected TurnoInterface $turnoRepository)
    {
    }

    public function getAll()
    {
        return $this->turnoRepository->getAll();
    }

    public function getById(int $id)
    {
        return $this->turnoRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->turnoRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->turnoRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->turnoRepository->delete($id);
    }

    public function findByFecha(string $diaTurno)
    {
        return $this->turnoRepository->findByFecha($diaTurno);
    }

    public function findByRangoFechas(string $fechaInicio, string $fechaFin)
    {
        return $this->turnoRepository->findByRangoFechas($fechaInicio, $fechaFin);
    }

    public function findConHorasExtras()
    {
        return $this->turnoRepository->findConHorasExtras();
    }

    public function findByHorario(int $idHorario)
    {
        return $this->turnoRepository->findByHorario($idHorario);
    }

    public function findByNombre(string $nombreTurno)
    {
        return $this->turnoRepository->findByNombre($nombreTurno);
    }

    public function findByJornada(string $jornada)
    {
        return $this->turnoRepository->findByJornada($jornada);
    }

    public function findByEmpleado(int $numeroIdentificacion)
    {
        return $this->turnoRepository->findByEmpleado($numeroIdentificacion);
    }
}