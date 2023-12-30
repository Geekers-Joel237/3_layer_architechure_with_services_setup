<?php

namespace App\User\Infrastructure\Provider;

use App\User\Data\Repository\EloquentUserRepository;
use App\User\Domain\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->loadMigrationsFrom(base_path('/src/User/Infrastructure/database/migrations'));
    }

    public function boot(): void
    {
        $this->bindModuleRepositories();
    }

    private function bindModuleRepositories(): void
    {
        $this->app->singleton(UserRepository::class, EloquentUserRepository::class);
    }
}
