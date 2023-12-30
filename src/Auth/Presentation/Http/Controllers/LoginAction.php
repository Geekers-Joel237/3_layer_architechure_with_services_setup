<?php

namespace App\Auth\Presentation\Http\Controllers;

use App\Auth\Domain\Services\AuthUserService;
use App\Auth\Presentation\Http\Requests\LoginRequest;
use Exception;
use Illuminate\Http\JsonResponse;

class LoginAction
{
    public function __invoke(
        LoginRequest    $request,
        AuthUserService $handler
    ): JsonResponse
    {
        $httpJson = [
            'status' => false,
            'isLogged' => false
        ];
        try {
            $response = $handler->handleLogin($request);
            $httpJson = [
                'status' => true,
                'isLogged' => $response->isLogged,
                'user' => $response->user,
                'message' => $response->message
            ];
        } catch
        (Exception $e) {
            dump($e->getMessage());
        }

        return response()->json($httpJson);
    }
}
