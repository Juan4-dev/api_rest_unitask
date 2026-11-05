<?php

namespace App\Interfaces;

interface VehiculoInterface extends BaseInterface
{
    public function findByPlaca(string $placaVehiculo);
    public function findByTipo(string $tipoVehiculo);
    public function findByServicio(int $idLabor);
}
