<?php

namespace App\Services;
use App\Repositories\EstadisticaRepository;

class EstadisticaService
{
    protected EstadisticaRepository $estadisticaRepository;

    public function __construct(EstadisticaRepository $estadisticaRepository)
    {
        $this->estadisticaRepository = $estadisticaRepository;    
    }

    public function getAll()
    {
        return $this->estadisticaRepository->getAll();  
    }

    public function getById(int $id)
    {
        return $this->estadisticaRepository->getById($id); 
    }

    public function create(array $data)
    {
        return $this->estadisticaRepository->create($data); 
    }

    public function update(int $id, array $data)
    {
        return $this->estadisticaRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->estadisticaRepository->delete($id);
    }

    public function findByChartType(string $tipoGrafico)
    {
        return $this->estadisticaRepository->findByChartType($tipoGrafico);
    }

    public function getByDateRange(string $fechaInicio, string $fechaFin)
    {
        return $this->estadisticaRepository->getByDateRange($fechaInicio, $fechaFin);
    }

    public function findByChartAndPeriod(string $tipoGrafico, string $fechaInicio, string $fechaFin)
    {
        return $this->estadisticaRepository->findByChartAndPeriod($tipoGrafico, $fechaInicio, $fechaFin);
    }

    public function findByReport(int $reporte)
    {
        return $this->estadisticaRepository->findByReport($reporte);
    }
}