<?php

namespace App\Repositories;

use App\Interfaces\VehiculoInterface;
use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Model;

class VehiculoRepository extends BaseRepository implements VehiculoInterface
{
    // El $model del BaseRepository es private, por eso se declara el propio aquí
    protected Model $model;

    public function __construct(Vehiculo $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    // La PK de vehiculo es la placa (string), por eso se sobrescriben con int|string
    public function getById(int|string $id)
    {
        $registro = $this->model->find($id);

        if (!$registro) {
            return null;
        }

        return $registro;
    }

    public function update(int|string $id, array $data)
    {
        $registro = $this->model->find($id);

        if (!$registro) {
            return null;
        }

        $registro->update($data);

        return $registro->fresh();
    }

    public function delete(int|string $id)
    {
        $registro = $this->model->find($id);

        if (!$registro) {
            return null;
        }

        return $registro->delete();
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
