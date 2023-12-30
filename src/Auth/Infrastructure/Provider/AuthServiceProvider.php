<?php

namespace App\Auth\Infrastructure\Provider;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerRoutes();
        $this->loadMigrationsFrom(base_path('/src/Auth/Infrastructure/database/migrations'));
    }

    public function boot(): void
    {

    }

    private function registerRoutes(): void
    {
        Route::group($this->routeConfig(), function () {
            $this->loadRoutesFrom(base_path('/src/Auth/Infrastructure/database/routes/api.php'));
        });

    }

    private function routeConfig(): array
    {
        return [
            'prefix' => 'auth',
            'middleware' => 'guest'
        ];
    }
}
