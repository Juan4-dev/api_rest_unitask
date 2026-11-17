<?php

namespace App\Interfaces;

interface UsuarioInterface extends BaseInterface
{
    public function findByNumeroIdentificacion(int $numeroIdentificacion);
    public function findByNombreEmpleado(string $nombreEmpleado);
    public function findByApellidoEmpleado(string $apellidoEmpleado);
    public function findByTelefonoEmpleado(string $telefonoEmpleado);
    public function findByCorreoEmpleado(string $correoEmpleado);
    public function findByUsuario(string $usuario);
    public function assignRole(int $numeroIdentificacion, int $idRol);
    public function verifyCredentials(string $usuario, string $password);
}