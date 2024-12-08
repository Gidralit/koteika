<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Equipment;
use App\Models\Header;
use App\Models\Room;
use App\Models\User;
use App\Policies\ContactPolicy;
use App\Policies\EquipmentPolicy;
use App\Policies\HeaderPolicy;
use App\Policies\RoomPolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    protected $namespace = 'App\Http\Controllers';

    protected $policies = [
        User::class => UserPolicy::class,
        Room::class => RoomPolicy::class,
        Header::class => HeaderPolicy::class,
        Contact::class => ContactPolicy::class,
        Equipment::class => EquipmentPolicy::class
    ];

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
