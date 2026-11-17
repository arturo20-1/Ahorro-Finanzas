<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function index(): View
    {
        return view('login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        // Los datos ya llegan validados por LoginRequest
        $credenciales = $request->validated();

        if (! Auth::attempt($credenciales)) {
            return back()
                ->withErrors(['email' => 'El correo o la contraseña no son correctos.'])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        // Una dirección de /admin guardada solo se respeta si el usuario es administrador
        $destino = $request->session()->pull('url.intended');
        $ruta = (string) parse_url((string) $destino, PHP_URL_PATH);

        if ($destino && (! str_starts_with($ruta, '/admin') || $request->user()->isAdmin())) {
            return redirect()->to($destino);
        }

        return redirect()->route('dashboard');
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        // Los datos ya llegan validados por RegisterRequest
        $datos = $request->validated();

        $usuario = User::create([
            'name' => $datos['name'],
            'email' => $datos['email'],
            'password' => $datos['password'], // se cifra solo (cast "hashed" del modelo)
        ]);

        Auth::login($usuario);
        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
