<?php

namespace App\Repositories;

use App\Models\Rol;
use App\Interfaces\RolInterface;

class RolRepository extends BaseRepository implements RolInterface
{
    public function __construct(Rol $rol)
    {
        parent::__construct($rol);
    }

    public function findByRol(int $rol)
    {
        return $this->model->where("rol", $rol)->get();
    }

    public function findByNameRol(string $nombreRol)
    {
        return $this->model->where("nombre_rol", $nombreRol)->get();
    }
}