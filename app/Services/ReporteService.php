<?php

namespace App\Services;

use App\Interfaces\ReporteInterface;

class ReporteService
{
    protected ReporteInterface $reporteRepository;

    // Inyectamos la interfaz del repositorio de reportes
    public function __construct(ReporteInterface $reporteRepository)
    {
        $this->reporteRepository = $reporteRepository;
    }

    public function getAllReportes()
    {
        return $this->reporteRepository->getAll();
    }

    public function getReporteById(int $id)
    {
        $reporte = $this->reporteRepository->findById($id);
        
        if (!$reporte) {
            return null;
        }

        return $reporte;
    }

    public function createReporte(array $data)
    {
        return $this->reporteRepository->create($data);
    }

    public function updateReporte(int $id, array $data)
    {
        return $this->reporteRepository->update($id, $data);
    }

    public function deleteReporte(int $id)
    {
        return $this->reporteRepository->delete($id);
    }


    public function getReportesByType(string $tipo_fallas)
    {
        return $this->reporteRepository->findByFailureType($tipo_fallas);
    }

    public function getReportesByCount(int $cantidad_fallas)
    {
        return $this->reporteRepository->getByFailureCount($cantidad_fallas);
    }

    public function getReportesByEmployee(int $numero_identificacion)
    {
        return $this->reporteRepository->getReportByEmployee($numero_identificacion);
    }
}