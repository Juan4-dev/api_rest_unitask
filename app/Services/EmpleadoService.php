<?php

namespace App\Services;

use App\Repositories\EmpleadoRepository;

class EmpleadoService
{
    public function __construct(protected EmpleadoRepository $empleadoRepository)
    {
    }

    public function getAll()
    {
        return $this->empleadoRepository->getAll();
    }

    public function getById($id)
    {
        return $this->empleadoRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->empleadoRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->empleadoRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->empleadoRepository->delete($id);
    }
    
    public function findByNumeroIdentificacion(int $numeroIdentificacion)
    {
        return $this->empleadoRepository->findByNumeroIdentificacion($numeroIdentificacion);
    }

    public function findByNombreEmpleado(string $nombreEmpleado)
    {
        return $this->empleadoRepository->findByNombreEmpleado($nombreEmpleado);
    }

    public function findByApellidoEmpleado(string $apellidoEmpleado)
    {
        return $this->empleadoRepository->findByApellidoEmpleado($apellidoEmpleado);
    }

    public function findByTelefonoEmpleado(string $telefonoEmpleado)
    {
        return $this->empleadoRepository->findByTelefonoEmpleado($telefonoEmpleado);
    }

    public function findByCorreoEmpleado(string $correoEmpleado)
    {
        return $this->empleadoRepository->findByCorreoEmpleado($correoEmpleado);
    }
}
