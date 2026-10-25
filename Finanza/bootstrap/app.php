<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // A dónde mandar a quien no ha iniciado sesión (admin y cliente son accesos separados)
        $middleware->redirectGuestsTo(fn (Request $request) => $request->is('admin', 'admin/*')
            ? route('admin.login')
            : route('login'));

        // A dónde mandar a quien ya tiene sesión y abre una pantalla de login
        $middleware->redirectUsersTo(fn (Request $request) => $request->is('admin', 'admin/*')
            ? route('admin.dashboard')
            : route('dashboard'));
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })->create();
