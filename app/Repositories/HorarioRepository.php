<?php

namespace App\Repositories;

use App\Interfaces\HorarioInterface;
use App\Models\Horario;

class HorarioRepository extends BaseRepository implements HorarioInterface
{
    public function __construct(Horario $horario)
    {
        parent::__construct($horario);
    }

    public function findById(int $id)
    {
        return $this->model->find($id);
    }

    public function findByHoraryType(string $tipoHorario)
    {
        return $this->model->where('tipo_horario', $tipoHorario)->get();
    }

    public function findByPeriod(string $periodo)
    {
        return $this->model->where('periodo', $periodo)->get();
    }

    public function findByIdentity(int $numeroIdentificacion)
    {
        return $this->model->where('numero_identificacion', $numeroIdentificacion)->get();
    }
}