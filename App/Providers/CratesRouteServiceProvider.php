<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class CratesRouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Http\Controllers\CratesOnSkates';
   
    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapWebRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix('crates')
            ->group(base_path('routes/crates_on_skates/route_lookups.php'));

        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix('crates')
            ->group(base_path('routes/crates_on_skates/route_checkout.php'));

        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix('crates')
            ->group(base_path('routes/crates_on_skates/route_cart.php'));
    }
}
