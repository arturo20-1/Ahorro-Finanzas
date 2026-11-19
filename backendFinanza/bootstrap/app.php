<?php

use App\Http\Middleware\EnsureAdmin;
use App\Http\Middleware\RestrictAdminIp;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        // Backend solo API: no hay rutas "web" ni vistas. Todo vive en routes/api.php (prefijo /api)
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Nombres cortos para usar en las rutas: ->middleware('admin')
        $middleware->alias([
            'admin' => EnsureAdmin::class,
            'admin.ip' => RestrictAdminIp::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Es una API: SIEMPRE responde JSON (nunca redirige ni muestra páginas HTML)
        $exceptions->shouldRenderJsonWhen(fn (Request $request) => true);
    })->create();
