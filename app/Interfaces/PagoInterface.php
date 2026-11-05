<?php

namespace App\Interfaces;

interface PagoInterface extends BaseInterface
{
    public function findByCalculoEmpleado(int $numeroIdentificacion);
}