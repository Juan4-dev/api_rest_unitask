<?php

namespace App\Interfaces;

interface UsuarioInterface extends BaseInterface
{
    public function findByUsuario(string $usuario);
    public function findByIdentification(string $numeroIdentificacion);
    public function findByRol(int $rol);
    public function assignRole(int $usuario, int $rol);
    public function verifyCredentials(string $usuario, string $contraseña);
}