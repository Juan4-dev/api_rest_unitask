<?php

namespace App\Interfaces;

interface RolInterface extends BaseInterface
{
    public function findByRol(int $idRol);
    public function findByNameRol(string $nombreRol);
}