<?php

namespace App\Services;

use App\Interfaces\HorarioInterface;

class HorarioService
{
    protected HorarioInterface $horarioRepository;

    public function __construct(HorarioInterface $horarioRepository)
    {
        $this->horarioRepository = $horarioRepository;
    }

    public function getAllHorarios()
    {
        return $this->horarioRepository->getAll();
    }

    public function getHorarioById(int $id)
    {
        $horario = $this->horarioRepository->findById($id);
        
        if (!$horario) {
            return null;
        }

        return $horario;
    }

    public function createHorario(array $data)
    {
        return $this->horarioRepository->create($data);
    }

    public function updateHorario(int $id, array $data)
    {
        return $this->horarioRepository->update($id, $data);
    }

    public function deleteHorario(int $id)
    {
        return $this->horarioRepository->delete($id);
    }

    public function getHorariosByType(string $tipo_horario)
    {
        return $this->horarioRepository->findByHoraryType($tipo_horario);
    }
}