<?php

namespace App\Repositories;

use App\Models\Pago;

class PagoRepository extends BaseRepository implements PagoInterface
{
    public function __construct(Pago $pago)
    {
        parent::__construct($pago);
    }

    public function findByCalculoEmpleado(int $numeroIdentificacion)
    {
        return $this->model->where("numero_identificacion", $numeroIdentificacion)->get();
    }
}