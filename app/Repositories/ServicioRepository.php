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

    public function findByName(string $nombre_servicio)
    {
        return $this->model->where('nombre_servicio', $nombre_servicio)->get();
    }

    public function findByTask(string $labor_servicio)
    {
        return $this->model->where('labor_servicio', $labor_servicio)->get();
    }

    public function getServicesByPay(int $idPago)
    {
        return $this->model->where('id_pago', $idPago)->get();
    }

    public function getHoursFromJob(int $horas_labor)
    {
        return $this->model->where('horas_labor', $horas_labor)->get();
    }

    public function getQuantityOfServices(int $cantidad_servicios)
    {
        return $this->model->where('cantidad_servicios', $cantidad_servicios)->get();
    }
}