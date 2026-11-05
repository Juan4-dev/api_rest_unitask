<?php

namespace App\Services;

use App\Interfaces\ClienteInterface;

class ClienteServices
{
    protected ClienteInterface $clienteRepository;

    public function __construct(ClienteInterface $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function getAll()
    {
        return $this->clienteRepository->getAll();
    }

    public function getById(int $id)
    {
        return $this->clienteRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->clienteRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->clienteRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->clienteRepository->delete($id);
    }

    
    public function findByCedula(int $cedulaCliente)
    {
        return $this->clienteRepository->findByCedula($cedulaCliente);
    }

    public function findByEmail(string $correoCliente)
    {
        return $this->clienteRepository->findByEmail($correoCliente);
    }

    public function findByName(string $nombreCliente)
    {
        return $this->clienteRepository->findByName($nombreCliente);
    }

    public function findByVehiculo(string $placaVehiculo)
    {
        return $this->clienteRepository->findByVehiculo($placaVehiculo);
    }
}
