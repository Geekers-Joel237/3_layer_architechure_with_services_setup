<?php

namespace App\Bootstrap\Infrastructure\Providers;

use App\User\Infrastructure\Provider\UserServiceProvider;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->isLocal()) {
            $this->app->register(IdeHelperServiceProvider::class);
        }
        $this->loadMigrationsFrom(base_path('src/Bootstrap/Infrastructure/database/migrations'));
        $this->registerServiceProviders();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    private function registerServiceProviders(): void
    {
        $this->app->register(UserServiceProvider::class);
    }
}
