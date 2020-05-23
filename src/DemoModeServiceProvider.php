<?php 
namespace DGvai\DemoMode;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use DGvai\DemoMode\DemoModeWare;

class DemoModeServiceProvider extends ServiceProvider
{
    public function boot(Router $router)
    {
        $router->middlewareGroup('demo', [DemoModeWare::class]);
    }

    public function register()
    {
        $this->publishers();
    }

    private function publishers()
    {
        $this->publishes([
            __DIR__.'/config/demomode.php' => config_path('demomode.php'),
        ], 'demomode');
    }
}