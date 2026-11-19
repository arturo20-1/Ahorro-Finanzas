<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

/**
 * Configuración de la cuenta del usuario: perfil y contraseña.
 */
class ProfileController extends Controller
{
    public function update(UpdateProfileRequest $request): UserResource
    {
        $usuario = $request->user();
        $usuario->update($request->validated());

        return new UserResource($usuario);
    }

    public function updatePassword(UpdatePasswordRequest $request): JsonResponse
    {
        $usuario = $request->user();
        $usuario->update(['password' => $request->validated('password')]); // se cifra con el cast "hashed"

        // Cierra las demás sesiones: solo queda vigente el token actual
        $usuario->tokens()->where('id', '!=', $usuario->currentAccessToken()->id)->delete();

        return response()->json(['message' => 'Contraseña actualizada.']);
    }
}
