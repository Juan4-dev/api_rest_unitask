<?php

namespace App\Interfaces;

interface RolInterface extends BaseInterface
{
    public function findByNameRol(string $nombreRol);
}