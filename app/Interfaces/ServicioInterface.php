<?php

namespace App\Interfaces;

interface ServicioInterface extends BaseInterface
{

public function findByName(string $nombre_servicio);
public function findByTask(string $labor_servicio);
public function getServicesByPay(int $idPago);
public function getHoursFromJob(int $horas_labor);
public function getQuantityOfServices(int $cantidad_servicios);

}