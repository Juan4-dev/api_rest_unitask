<?php

namespace App\Repositories;

use App\Models\Empleado;
use App\Interfaces\EmpleadoInterface;

class EmpleadoRepository extends BaseRepository implements EmpleadoInterface
{
    public function __construct(Empleado $empleado)
    {
        parent::__construct($empleado);
    }

    public function findByNombreEmpleado(string $nombreEmpleado)
    {
        return $this->model->where("nombre_empleado", $nombreEmpleado)->get();
    }

    public function findByNumeroIdentificacion(int $numeroIdentificacion)
    {
        return $this->model->where("numero_identificacion", $numeroIdentificacion)->first();
    }

    public function findByApellidoEmpleado(string $apellidoEmpleado)
    {
        return $this->model->where("apellido_empleado", $apellidoEmpleado)->get();
    }

    public function findByTelefonoEmpleado(int $telefonoEmpleado)
    {
        return $this->model->where("telefono_empleado", $telefonoEmpleado)->get();
    }
}