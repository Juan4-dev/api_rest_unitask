<?php

namespace App\Repositories;

use App\Models\Pago;
use App\Interfaces\PagoInterface;

class PagoRepository extends BaseRepository implements PagoInterface
{
    public function __construct(Pago $pago)
    {
        parent::__construct($pago);
    }

    public function findByCalculoEmpleado(int $numeroIdentificacion)
    {
        return $this->model->whereHas('servicio', function ($query) use ($numeroIdentificacion) {
            $query->where('numero_identificacion', $numeroIdentificacion);
        })->with(['servicio', 'rol'])->get();
    }
}