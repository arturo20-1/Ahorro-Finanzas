<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Support\AuthCookie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/**
 * Autenticación con tokens (Laravel Sanctum).
 * El token se guarda en una cookie HttpOnly (el navegador la manda sola). Las herramientas
 * como Postman o curl también pueden usar la cabecera  Authorization: Bearer <token>.
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

        $token = $usuario->createToken('api')->plainTextToken;

        return response()->json([
            'user' => new UserResource($usuario),
            'token' => $token, // para Postman/curl; el navegador usa la cookie
        ], 201)->withCookie(AuthCookie::make($token));
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

        $token = $usuario->createToken('api')->plainTextToken;

        return response()->json([
            'user' => new UserResource($usuario),
            'token' => $token, // para Postman/curl; el navegador usa la cookie
        ])->withCookie(AuthCookie::make($token));
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

        // Además de borrar el token, le pide al navegador que borre la cookie
        return response()->json(['message' => 'Sesión cerrada.'])->withCookie(AuthCookie::forget());
    }
}
