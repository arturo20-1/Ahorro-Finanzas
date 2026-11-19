<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/**
 * Autenticación con tokens (Laravel Sanctum).
 * No usa sesión ni cookies: el cliente (React) guarda el token y lo manda en
 * la cabecera  Authorization: Bearer <token>.
 */
class AuthController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $datos = $request->validated();

        $usuario = User::create([
            'name' => $datos['name'],
            'email' => $datos['email'],
            'password' => $datos['password'], // se cifra solo (cast "hashed" del modelo)
        ]);

        return response()->json([
            'user' => new UserResource($usuario),
            'token' => $usuario->createToken('api')->plainTextToken,
        ], 201);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $usuario = User::where('email', $request->validated('email'))->first();

        if (! $usuario || ! Hash::check($request->validated('password'), $usuario->password)) {
            throw ValidationException::withMessages([
                'email' => 'El correo o la contraseña no son correctos.',
            ]);
        }

        // Un login nuevo revoca los tokens anteriores (así no se acumulan tokens olvidados)
        $usuario->tokens()->delete();

        return response()->json([
            'user' => new UserResource($usuario),
            'token' => $usuario->createToken('api')->plainTextToken,
        ]);
    }

    /**
     * Datos del usuario dueño del token.
     */
    public function user(Request $request): UserResource
    {
        return new UserResource($request->user());
    }

    public function logout(Request $request): JsonResponse
    {
        // Borra solo el token con el que se hizo esta petición
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Sesión cerrada.']);
    }
}
