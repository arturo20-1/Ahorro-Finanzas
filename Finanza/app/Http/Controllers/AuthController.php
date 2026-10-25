<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function index(): View
    {
        return view('login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credenciales = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Escribe tu correo electrónico.',
            'email.email' => 'Escribe un correo electrónico válido.',
            'password.required' => 'Escribe tu contraseña.',
        ]);

        if (! Auth::attempt($credenciales)) {
            return back()
                ->withErrors(['email' => 'El correo o la contraseña no son correctos.'])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        // La sesión es compartida con el panel de administrador: si antes se intentó abrir
        // /admin, esa dirección queda guardada y mandaría al cliente al login del admin.
        $destino = $request->session()->pull('url.intended');
        $ruta = (string) parse_url((string) $destino, PHP_URL_PATH);

        if ($destino && ! str_starts_with($ruta, '/admin')) {
            return redirect()->to($destino);
        }

        return redirect()->route('dashboard');
    }

    public function register(Request $request): RedirectResponse
    {
        $datos = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(8)],
            'terms' => ['accepted'],
        ], [
            'name.required' => 'Escribe tu nombre completo.',
            'email.required' => 'Escribe tu correo electrónico.',
            'email.email' => 'Escribe un correo electrónico válido.',
            'email.unique' => 'Ese correo ya está registrado.',
            'password.required' => 'Escribe una contraseña.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'terms.accepted' => 'Debes aceptar los términos de servicio.',
        ]);

        $usuario = User::create([
            'name' => $datos['name'],
            'email' => $datos['email'],
            'password' => $datos['password'], // se cifra solo (cast "hashed" del modelo)
        ]);

        // El usuario nuevo empieza usando todas las categorías del catálogo global
        $usuario->categories()->attach(Category::pluck('id')->all());

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
