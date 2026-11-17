<?php

namespace App\Services;

use App\Interfaces\PagoInterface;

class PagoService
{
    protected PagoInterface $pagoRepository;

    public function __construct(PagoInterface $pagoRepository)
    {
        $this->pagoRepository = $pagoRepository;
    }

    public function getAll()
    {
        return $this->pagoRepository->getAll();
    }

    public function getById(int $id)
    {
        return $this->pagoRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->pagoRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->pagoRepository->update($id, $data);
    }

    public function delete(int $id)
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