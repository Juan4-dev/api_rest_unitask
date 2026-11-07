<?php

namespace App\Services;

use App\Interfaces\VehiculoInterface;

class VehiculoService
{
    protected VehiculoInterface $vehiculoRepository;

    public function __construct(VehiculoInterface $vehiculoRepository)
    {
        $this->vehiculoRepository = $vehiculoRepository;
    }

    public function getAll()
    {
        return $this->vehiculoRepository->getAll();
    }

    
    public function getById(int|string $id)
    {
        return $this->vehiculoRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->vehiculoRepository->create($data);
    }

    public function update(int|string $id, array $data)
    {
        return $this->vehiculoRepository->update($id, $data);
    }

    public function delete(int|string $id)
    {
        return $this->vehiculoRepository->delete($id);
    }

    
    public function findByPlaca(string $placaVehiculo)
    {
        return $this->vehiculoRepository->findByPlaca($placaVehiculo);
    }

    public function findByTipo(string $tipoVehiculo)
    {
        return $this->vehiculoRepository->findByTipo($tipoVehiculo);
    }

    public function findByServicio(int $idLabor)
    {
        return $this->vehiculoRepository->findByServicio($idLabor);
    }
}
