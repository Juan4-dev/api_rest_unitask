<?php

namespace App\Services;
use App\Repositories\AsistenciaRepository;

class AsistenciaService
{
    protected AsistenciaRepository $asistenciaRepository;

    public function __construct(AsistenciaRepository $asistenciaRepository)
    {
        $this->asistenciaRepository = $asistenciaRepository;    
    }

    public function getAll()
    {
        return $this->asistenciaRepository->getAll();  
    }

    public function getById(int $id)
    {
        return $this->asistenciaRepository->getById($id); 
    }

    public function create(array $data)
    {
        return $this->asistenciaRepository->create($data); 
    }

    public function update(int $id, array $data)
    {
        return $this->asistenciaRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->asistenciaRepository->delete($id);
    }

    public function findByDate(string $fecha)
    {
        return $this->asistenciaRepository->findByDate($fecha);
    }

    public function findByDateRange(string $fechaInicio, string $fechaFin)
    {
        return $this->asistenciaRepository->findByDateRange($fechaInicio, $fechaFin);
    }

    public function findByIdentity(string $numeroIdentificacion)
    {
        return $this->asistenciaRepository->findByIdentity($numeroIdentificacion);
    }

    public function findByStatus(string $estadoValidacion)
    {
        return $this->asistenciaRepository->findByStatus($estadoValidacion);
    }

    public function registerEntry(array $asistencia)
    {
        return $this->asistenciaRepository->registerEntry($asistencia);
    }

    public function registerExit(int $asistencia)
    {
        return $this->asistenciaRepository->registerExit($asistencia);
    }
}