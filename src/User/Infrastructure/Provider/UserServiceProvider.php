<?php

namespace App\User\Infrastructure\Provider;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->loadMigrationsFrom(base_path('/src/User/Infrastructure/database/migrations'));
    }
}
