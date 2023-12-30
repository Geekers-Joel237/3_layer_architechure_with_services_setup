<?php

namespace App\Auth\Domain\Services;

use App\Auth\Presentation\Http\Requests\LoginRequest;
use App\Auth\Presentation\Responses\LoginResponse;
use App\User\Domain\Repository\UserRepository;
use Exception;
use Illuminate\Support\Facades\Auth;

class AuthUserService
{
    public function __construct(
        private readonly UserRepository $repository
    )
    {
    }

    const API_TOKEN = 'API TOKEN';

    /**
     * @throws Exception
     */
    public function handleLogin(LoginRequest $request): LoginResponse
    {
        $response = new LoginResponse();
        if (!Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            throw new Exception('Email & Password does not match with our record.');
        }
        $user = $this->repository->byEmail($request->get('email'));

        if ($user) {
            $response->user = $user;
            $response->token = $user->createToken(self::API_TOKEN)->plainTextToken;
            $response->message = 'User Logged Successfully';
            $response->isLogged = true;
            return $response;
        }

        throw new Exception('User Not Found');
    }
}
