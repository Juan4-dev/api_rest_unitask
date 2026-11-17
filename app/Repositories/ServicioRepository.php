<?php

namespace App\Repositories;

use App\Interfaces\ServicioInterface;
use App\Models\Servicio;

class ServicioRepository extends BaseRepository implements ServicioInterface
{
    public function __construct(Servicio $servicio)
    {
        parent::__construct($servicio);
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function findByName(string $nombreServicio)
    {
        return $this->model->where('nombre_servicio', $nombreServicio)->get();
    }

    public function findByTask(string $laborServicio)
    {
        return $this->model->where('labor_servicio', $laborServicio)->get();
    }

    public function getServicesByPay(int $idPago)
    {
        return $this->model->whereHas('pagos', function ($query) use ($idPago) {
            $query->where('id_pago', $idPago);
        })->get();
    }

    public function getHoursFromJob(string $horasLabor)
    {
        return $this->model->where('horas_labor', $horasLabor)->get();
    }

    public function getQuantityOfServices(int $cantidadServicios)
    {
        return $this->model->where('cantidad_servicios', $cantidadServicios)->get();
    }

    public function findByIdentity(int $numeroIdentificacion)
    {
        return $this->model->where('numero_identificacion', $numeroIdentificacion)->get();
    }

    public function findByVehiculo(string $placaVehiculo)
    {
        return $this->model->where('placa_vehiculo', $placaVehiculo)->get();
    }
}