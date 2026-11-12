<?php

namespace App\Repositories;

use App\Models\Cliente;
use App\Interfaces\ClienteInterface;

class ClienteRepository extends BaseRepository implements ClienteInterface
{
    public function __construct(Cliente $cliente)
    {
        parent::__construct($cliente);
    }

    public function findByCedula(int $cedulaCliente)
    {
        return $this->model->where("cedula_cliente", $cedulaCliente)->first();
    }

    public function findByEmail(string $correoCliente)
    {
        return $this->model->where("correo_cliente", $correoCliente)->first();
    }

    public function findByName(string $nombreCliente)
    {
        return $this->model->where("nombre_cliente", "like", "%" . $nombreCliente . "%")->get();
    }

    public function findByVehiculo(string $placaVehiculo)
    {
        return $this->model->where("placa_vehiculo", $placaVehiculo)->get();
    }
}