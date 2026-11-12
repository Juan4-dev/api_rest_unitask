<?php

namespace App\Interfaces;

interface UsuarioInterface extends BaseInterface
{
    public function findByNombreEmpleado(string $nombreEmpleado);
    public function findByNumeroIdentificacion(int $numeroIdentificacion);
    public function findByApellidoEmpleado(string $apellidoEmpleado);
    public function findByTelefonoEmpleado(int $telefonoEmpleado);
    public function findByUsuario(string $usuario);
    public function assignRole(int $usuario, int $rol);
    public function verifyCredentials(string $usuario, string $contraseña);
}