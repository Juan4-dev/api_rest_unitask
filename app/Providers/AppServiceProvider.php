<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Interfaces
use App\Interfaces\VehiculoInterface;
use App\Interfaces\ClienteInterface;
use App\Interfaces\EmpleadoInterface;
use App\Interfaces\PagoInterface;
use App\Interfaces\RolInterface;
use App\Interfaces\ServicioInterface;
use App\Interfaces\HorarioInterface;
use App\Interfaces\ReporteInterface;
use App\Interfaces\AsistenciaInterface;
use App\Interfaces\EstadisticaInterface;
use App\Interfaces\UsuarioInterface;

// Repositories
use App\Repositories\VehiculoRepository;
use App\Repositories\ClienteRepository;
use App\Repositories\EmpleadoRepository;
use App\Repositories\PagoRepository;
use App\Repositories\RolRepository;
use App\Repositories\ServicioRepository;
use App\Repositories\HorarioRepository;
use App\Repositories\ReporteRepository;
use App\Repositories\AsistenciaRepository;
use App\Repositories\EstadisticaRepository;
use App\Repositories\UsuarioRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(VehiculoInterface::class, VehiculoRepository::class);
        $this->app->bind(ClienteInterface::class, ClienteRepository::class);
        $this->app->bind(EmpleadoInterface::class, EmpleadoRepository::class);
        $this->app->bind(PagoInterface::class, PagoRepository::class);
        $this->app->bind(RolInterface::class, RolRepository::class);
        $this->app->bind(ServicioInterface::class, ServicioRepository::class);
        $this->app->bind(HorarioInterface::class, HorarioRepository::class);
        $this->app->bind(ReporteInterface::class, ReporteRepository::class);
        $this->app->bind(AsistenciaInterface::class, AsistenciaRepository::class);
        $this->app->bind(EstadisticaInterface::class, EstadisticaRepository::class);
        $this->app->bind(UsuarioInterface::class, UsuarioRepository::class);  
    } 

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}