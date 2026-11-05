<?php

namespace App\Repositories;

use App\Models\Asistencia;
use App\Interfaces\AsistenciaInterface;
use Carbon\Carbon;

class AsistenciaRepository extends BaseRepository implements AsistenciaInterface
{
    public function __construct(Asistencia $asistencia)
    {
        parent::__construct($asistencia);
    }

    public function findByDate(string $fecha)
    {
        return $this->model->where("fecha", $fecha)->get();
    }

    public function findByDateRange(string $fechaInicio, string $fechaFin)
    {
        return $this->model->whereBetween("fecha", [$fechaInicio, $fechaFin])->get();
    }

    public function findByIdentity(string $numeroIdentificacion)
    {
        return $this->model->where("numero_identificacion", $numeroIdentificacion)->get();
    }

    public function findByStatus(string $estadoValidacion)
    {
        return $this->model->where("estado_validacion", $estadoValidacion)->get();
    }

    public function registerEntry(array $asistencia)
    {
        return $this->model->create($asistencia);
    }
   
    public function registerExit(int $asistencia, Carbon $horaSalida)
    {
    $registroAsistencia=$this->model->find($asistencia);
    if ($registroAsistencia) 
    {
        $registroAsistencia->update(["hora_salida"=>$horaSalida]);
        return $registroAsistencia;
    }
    return null;
    }
}