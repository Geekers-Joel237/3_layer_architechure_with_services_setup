<?php

namespace Database\Seeders;

use App\User\Infrastructure\database\seeders\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(
            [
                UserSeeder::class
            ]
        );
    }
}
