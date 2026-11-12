<?php

namespace App\Repositories;

use App\Models\Vehiculo;
use App\Interfaces\VehiculoInterface;

class VehiculoRepository extends BaseRepository implements VehiculoInterface

{

    public function __construct(Vehiculo $vehiculo)

    {
        parent::__construct($vehiculo);
    }

    public function findByPlaca(string $placaVehiculo)

    {
        return $this->model->where("placa_vehiculo", $placaVehiculo)->first();
    }

    public function findByTipo(string $tipoVehiculo)

    {
        return $this->model->where("tipo_vehiculo", $tipoVehiculo)->get();
    }



    public function findByServicio(int $idLabor)

    {
        return $this->model->where("id_labor", $idLabor)->get();
    }
} 

