<?php

namespace App\Http\Middleware;

use App\Support\AuthCookie;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Si la petición trae el token en la cookie (navegador) y no en la cabecera Authorization,
 * lo copia a la cabecera para que Sanctum lo reconozca. Las herramientas que mandan
 * "Authorization: Bearer ..." (Postman, curl) siguen funcionando igual.
 */
class TokenFromCookie
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->bearerToken()) {
            $token = $request->cookie(AuthCookie::name());

            if (is_string($token) && $token !== '') {
                $request->headers->set('Authorization', 'Bearer '.$token);
            }
        }

        return $next($request);
    }
}
