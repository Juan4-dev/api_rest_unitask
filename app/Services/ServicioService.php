<?php

namespace App\Services;

use App\Interfaces\ServicioInterface;

class ServicioService
{
    protected $servicioRepository;

    // Inyectamos la interfaz del repositorio de servicios
    public function __construct(ServicioInterface $servicioRepository)
    {
        $this->servicioRepository = $servicioRepository;
    }

    public function getAllServicios()
    {
        return $this->servicioRepository->getAll();
    }

    public function getServicioById(int $id)
    {
        $servicio = $this->servicioRepository->find($id);

        if (!$servicio) {
            return null;
        }

        return $servicio;
    }

    public function createServicio(array $data)
    {
        return $this->servicioRepository->create($data);
    }

    public function updateServicio(int $id, array $data)
    {
        return $this->servicioRepository->update($id, $data);
    }

    public function deleteServicio(int $id)
    {
        return $this->servicioRepository->delete($id);
    }

    

    public function getServiciosByName(string $nombre_servicio)
    {
        return $this->servicioRepository->findByName($nombre_servicio);
    }

    public function getServiciosByTask(string $labor_servicio)
    {
        return $this->servicioRepository->findByTask($labor_servicio);
    }

    public function getServiciosByPay(int $idPago)
    {
        return $this->servicioRepository->getServicesByPay($idPago);
    }

    public function getServiciosByHours(string $horas_labor)
    {
        return $this->servicioRepository->getHoursFromJob($horas_labor);
    }

    public function getServiciosByQuantity(int $cantidad_servicios)
    {
        return $this->servicioRepository->getQuantityOfServices($cantidad_servicios);
    }
}