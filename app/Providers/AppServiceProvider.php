<?php
 
namespace App\Providers;
 
use Illuminate\Support\ServiceProvider;
use App\Interfaces\VehiculoInterface;
use App\Repositories\VehiculoRepository;
use App\Interfaces\ClienteInterface;
use App\Repositories\ClienteRepository;
use App\Interfaces\AsistenciaInterface;
use App\Repositories\AsistenciaRepository;
use App\Interfaces\EstadisticaInterface;
use App\Repositories\EstadisticaRepository;
use App\Interfaces\UsuarioInterface;
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