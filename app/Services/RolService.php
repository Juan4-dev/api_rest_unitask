<?php

namespace App\Services;

use App\Repositories\RolRepository;

class RolService
{
    public function __construct(protected RolRepository $rolRepository)
    {
    }

    public function getAll()
    {
        return $this->rolRepository->getAll();
    }

    public function getById($id)
    {
        return $this->rolRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->rolRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->rolRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->rolRepository->delete($id);
    }

    public function findByNameRol(string $nombreRol)
    {
        return $this->rolRepository->findByNameRol($nombreRol); 
    }
}