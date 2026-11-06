<?php

namespace App\Services;

use App\Repositories\PagoRepository;

class PagoService
{
    public function __construct(protected PagoRepository $pagoRepository)
    {
    }

    public function getAll()
    {
        return $this->pagoRepository->getAll();
    }

    public function getById($id)
    {
        return $this->pagoRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->pagoRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->pagoRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->pagoRepository->delete($id);
    }

    public function calcularNominaEmpleado(int $numeroIdentificacion)
    {
        $pagos = $this->pagoRepository->findByCalculoEmpleado($numeroIdentificacion);

        if ($pagos->isEmpty()) {
            return null;
        }

        $totalAcumulado = $pagos->sum('total_pago');

        return [
            'numero_identificacion' => $numeroIdentificacion,
            'total_servicios_pagados' => $pagos->count(),
            'total_nomina' => $totalAcumulado,
            'detalle_pagos' => $pagos
        ];
    }
}
