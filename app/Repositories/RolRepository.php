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

    public function findByRol(int $idRol)
    {
        return $this->model->where("id_rol", $idRol)->first();
    }

    public function findByNameRol(string $nombreRol)
    {
        return $this->model->where("nombre_rol", $nombreRol)->get();
    }
}