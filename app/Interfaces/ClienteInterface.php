<?php

namespace App\Interfaces;

interface ClienteInterface extends BaseInterface
{
    public function findByCedula(int $cedulaCliente);
    public function findByEmail(string $correoCliente);
    public function findByName(string $nombreCliente);
    public function findByVehiculo(string $placaVehiculo);
}
