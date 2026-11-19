<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/**
 * Login del panel de administrador: solo acepta usuarios con is_admin = true.
 */
class AdminAuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $usuario = User::where('email', $request->validated('email'))->first();

        // Mismo mensaje en todos los fallos: no se revela si el correo existe ni si es administrador
        if (! $usuario || ! $usuario->isAdmin() || ! Hash::check($request->validated('password'), $usuario->password)) {
            throw ValidationException::withMessages([
                'email' => 'El correo o la contraseña no son correctos.',
            ]);
        }

        $usuario->tokens()->delete();

        return response()->json([
            'user' => new UserResource($usuario),
            'token' => $usuario->createToken('admin')->plainTextToken,
        ]);
    }
}
