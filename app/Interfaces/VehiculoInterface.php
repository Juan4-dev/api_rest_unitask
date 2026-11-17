<?php

namespace App\Interfaces;

interface VehiculoInterface extends BaseInterface
{
    public function findByPlaca(string $placaVehiculo);
    public function findByTipo(string $tipoVehiculo);
    public function findByCliente(int $cedulaCliente);
    public function findByServicio(int $idLabor);
}
