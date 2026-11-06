<?php
 
namespace App\Providers;
 
use Illuminate\Support\ServiceProvider;
use App\Interfaces\VehiculoInterface;
use App\Repositories\VehiculoRepository;
use App\Interfaces\ClienteInterface;
use App\Repositories\ClienteRepository;
 
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(VehiculoInterface::class, VehiculoRepository::class);
        $this->app->bind(ClienteInterface::class, ClienteRepository::class);
    }
 
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}