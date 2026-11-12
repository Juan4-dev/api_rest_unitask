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
        return $this->turnoRepository->getAll(); // Corregido de all() a getAll()
    }

    public function getById($id)
    {
        return $this->turnoRepository->getById($id); // Corregido de find() a getById()
    }

    public function create(array $data)
    {
        return $this->turnoRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->turnoRepository->update($id, $data);
    }

    public function delete($id)
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
}