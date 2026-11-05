<?php

namespace App\Repositories;


use App\Models\Cliente;


class ClienteRepository extends BaseRepository implements ClienteInterface
{
    
    protected Model $model;

    public function __construct(Cliente $model)
    {
        parent::__construct($model);
        $this->model = $model;
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
