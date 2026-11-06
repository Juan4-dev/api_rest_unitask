<?php

namespace App\Repositories;

use App\Interfaces\HorarioInterface;
use App\Models\Horario;
use Illuminate\Database\Eloquent\Model;
use Override;

class HorarioRepository extends BaseRepository implements HorarioInterface
{


 public function __construct(Model $horario)
 {
 parent::__construct($horario);
 }
 
  public function findByHoraryType(string $tipo_horario)
  {
    return $this->model->where('tipo_horario',$tipo_horario)->get();
  }
 
  public function getByTimeJob(int $periodo_labor){
    return $this->model->where('periodo_labor',$periodo_labor)->get();
  }

  public function findByNameShift(string $periodo_labor)
  {
    return $this->model->where('periodo_labor',$periodo_labor)->get();
  }

  public function findByDateShift(int $nombre_turno)
  {
    return $this->model->where('nombre_turno', $nombre_turno)->get();
  }

  public function findByWorkDay(string $jornada)
  {
    return $this->model->where('jornada', $jornada)->get();
  }

}