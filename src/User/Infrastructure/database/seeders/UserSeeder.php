<?php

namespace App\User\Infrastructure\database\seeders;

use App\User\Data\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $this->createUsers();
    }

    private function createUsers(): void
    {
        User::factory(2)->create([
            'email' => 'user-mvc@gmail.com',
            'password' => '123456789'
        ]);
    }

}
