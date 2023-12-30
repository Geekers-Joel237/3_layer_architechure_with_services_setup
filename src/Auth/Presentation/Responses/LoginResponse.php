<?php

namespace App\Auth\Presentation\Responses;

use App\User\Data\Models\User;

class LoginResponse
{

    public ?User $user = null;
    public string $token = '';
    public string $message = '';
    public bool $isLogged = false;
}
