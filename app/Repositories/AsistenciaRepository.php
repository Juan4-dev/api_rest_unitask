<?php

namespace App\Repositories;

use App\Interfaces\AsistenciaInterface;
use App\Models\Asistencia;

class AsistenciaRepository extends BaseRepository implements AsistenciaInterface
{
    public function __construct(Asistencia $asistencia)
    {
        parent::__construct($asistencia);
    }

    public function findByDate(string $fecha)
    {
        return $this->model->with('usuario')->where('fecha', $fecha)->get();
    }

    public function findByDateRange(string $fechaInicio, string $fechaFin)
    {
        return $this->model->with('usuario')->whereBetween('fecha', [$fechaInicio, $fechaFin])->get();
    }

    public function findByIdentity(int $numeroIdentificacion)
    {
        return $this->model->with('usuario')->where('numero_identificacion', $numeroIdentificacion)->get();
    }

    public function findByStatus(string $estadoValidacion)
    {
        return $this->model->with('usuario')->where('estado_validacion', $estadoValidacion)->get();
    }

    public function registerEntry(array $asistencia)
    {
        return $this->model->create($asistencia);
    }

    public function registerExit(int $idAsistencia, string $horaSalida)
    {
        $registroAsistencia = $this->model->find($idAsistencia);
        if ($registroAsistencia) {
            $registroAsistencia->update(['hora_salida' => $horaSalida]);
            return $registroAsistencia;
        }
        return null;
    }
}