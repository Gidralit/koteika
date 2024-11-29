<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    protected $namespace = 'App\Http\Controllers';

    public function boot(): void
    {
        $this->mapApiRoutes();
    }

    protected function mapApiRoutes(){
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
}
