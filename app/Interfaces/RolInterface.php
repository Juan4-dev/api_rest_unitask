<?php

namespace App\Interfaces;

interface RolInterface extends BaseInterface
{
    public function findByRol(int $rol);
    public function findByNameRol(string $nombreRol);
}