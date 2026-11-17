<?php

namespace App\Interfaces;

interface ServicioInterface extends BaseInterface
{
    public function find(int $id);
    public function findByName(string $nombreServicio);
    public function findByTask(string $laborServicio);
    public function getServicesByPay(int $idPago);
    public function getHoursFromJob(string $horasLabor);
    public function getQuantityOfServices(int $cantidadServicios);
    public function findByIdentity(int $numeroIdentificacion);
    public function findByVehiculo(string $placaVehiculo);
}