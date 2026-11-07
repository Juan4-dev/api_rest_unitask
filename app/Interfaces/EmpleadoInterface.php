<?php

namespace App\Interfaces;

interface EmpleadoInterface extends BaseInterface
{
    public function findByNombreEmpleado(string $nombreEmpleado);
    public function findByNumeroIdentificacion(int $numeroIdentificacion);
    public function findByApellidoEmpleado(string $apellidoEmpleado);
    public function findByTelefonoEmpleado(int $telefonoEmpleado);
}