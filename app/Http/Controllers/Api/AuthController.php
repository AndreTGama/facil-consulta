<?php

namespace App\Http\Controllers\Api;

use App\Builder\ReturnMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
   /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (!$token = auth('api')->attempt($credentials)) {
            return ReturnMessage::message(
                true,
                'Unauthorized',
                'Unauthorized',
                null,
                null,
                401
            );
        }

        $response = [
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ];

        return ReturnMessage::message(
            false,
            'Login made successfully',
            'Login made successfully',
            null,
            $response,
            200
        );
    }
   /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(): JsonResponse
    {
        try {
            return response()->json(auth()->user());
        } catch (\Exception $e) {
            return ReturnMessage::message(
                true,
                $e->getMessage(),
                $e->getMessage(),
                null,
                null,
                401
            );
        }
    }
}
