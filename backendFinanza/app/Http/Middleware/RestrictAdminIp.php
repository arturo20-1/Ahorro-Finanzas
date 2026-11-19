<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\IpUtils;
use Symfony\Component\HttpFoundation\Response;

class RestrictAdminIp
{
    /**
     * Solo deja pasar al panel de administrador a las IPs de config/admin.php.
     * Responde 404 para que nadie sepa que el panel existe.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $permitidas = config('admin.allowed_ips', []);

        if ($permitidas === []) {
            if (app()->environment(['local', 'testing'])) {
                return $next($request);
            }

            $this->bloquear($request);
        }

        if (! IpUtils::checkIp((string) $request->ip(), $permitidas)) {
            $this->bloquear($request);
        }

        return $next($request);
    }

    private function bloquear(Request $request): never
    {
        Log::warning('Acceso al panel de administrador bloqueado por IP', [
            'ip' => $request->ip(),
            'url' => $request->fullUrl(),
        ]);

        abort(404);
    }
}
