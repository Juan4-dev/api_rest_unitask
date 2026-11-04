<?php

namespace App\Interfaces;

interface UsuarioInterface extends BaseInterface
{
    public function findByUsername(string $usuario);
    public function findByRole(int $rol);
}