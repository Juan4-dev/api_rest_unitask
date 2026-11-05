<?php

namespace App\Repositories;


use App\Models\Vehiculo;


class VehiculoRepository extends BaseRepository implements VehiculoInterface
{
    public function __construct(Vehiculo $vehiculo)
    {
        parent::__construct($vehiculo);
    
    }
    
    public function getById(int|string $id)
    {
    return $this->model->find($id);
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
