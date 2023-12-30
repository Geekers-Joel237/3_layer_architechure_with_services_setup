<?php

namespace App\User\Tests\E2E;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SaveUserTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    /*public function test_can_register_user()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'password' => 'azerty@123'
        ];

        $response = $this->postJson('api/users', $data);

        $response->assertOk();
        $this->assertTrue($response['isLogged']);
        $this->assertNotNull($response['user']);
    }*/
}
