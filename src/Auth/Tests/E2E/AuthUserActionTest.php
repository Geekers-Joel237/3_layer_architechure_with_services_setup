<?php

namespace App\Auth\Tests\E2E;

use App\User\Data\Models\User as UserModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthUserActionTest extends TestCase
{
    use RefreshDatabase;
    private UserModel $user;
    public function setUp(): void
    {
        parent::setUp();
        $this->user = UserModel::factory()->create(['password' => 'azerty@123']);
    }

    public function test_can_login_user()
    {
        $data = [
            'email' => $this->user->getAttributeValue('email'),
            'password' => 'azerty@123'
        ];

        $response = $this->postJson('api/auth/login', $data);

        $response->assertOk();
        $this->assertTrue($response['isLogged']);
        $this->assertNotNull($response['user']);
    }

    public function test_can_register_user()
    {
        $data = [
            'name' => $this->user->getAttributeValue('name'),
            'email' => $this->user->getAttributeValue('email'),
            'password' => 'azerty@123'
        ];

        $response = $this->postJson('api/auth/register', $data);

        $response->assertOk();
        $this->assertTrue($response['isLogged']);
        $this->assertNotNull($response['user']);
    }
}
