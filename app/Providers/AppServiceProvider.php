<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\VehiculoInterface;
use App\Repositories\VehiculoRepository;
use App\Interfaces\ClienteInterface;
use App\Repositories\ClienteRepository;
use App\Interfaces\EmpleadoInterface;
use App\Repositories\PagoRepository;
use App\Repositories\RolRepository;

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
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}