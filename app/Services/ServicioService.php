<?php

namespace App\Services;

use App\Interfaces\ServicioInterface;

class ServicioService
{
    protected ServicioInterface $servicioRepository;

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
        $servicio = $this->servicioRepository->getById($id);

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

    public function getServiciosByName(string $nombreServicio)
    {
        return $this->servicioRepository->findByName($nombreServicio);
    }

    public function getServiciosByTask(string $laborServicio)
    {
        return $this->servicioRepository->findByTask($laborServicio);
    }

    public function getServiciosByPay(int $idPago)
    {
        return $this->servicioRepository->getServicesByPay($idPago);
    }

    public function getServiciosByHours(string $horasLabor)
    {
        return $this->servicioRepository->getHoursFromJob($horasLabor);
    }

    public function getServiciosByQuantity(int $cantidadServicios)
    {
        return $this->servicioRepository->getQuantityOfServices($cantidadServicios);
    }

    public function getServiciosByIdentity(int $numeroIdentificacion)
    {
        return $this->servicioRepository->findByIdentity($numeroIdentificacion);
    }

    public function getServiciosByVehiculo(string $placaVehiculo)
    {
        return $this->servicioRepository->findByVehiculo($placaVehiculo);
    }
}