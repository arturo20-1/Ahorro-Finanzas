<?php

namespace App\Support;

use Symfony\Component\HttpFoundation\Cookie;

/**
 * Crea y borra la cookie que guarda el token de acceso.
 */
class AuthCookie
{
    public static function name(): string
    {
        return (string) config('auth_cookie.name', 'finanzas_token');
    }

    /**
     * Cookie HttpOnly con el token. Dura lo mismo que el token (config/sanctum.php).
     */
    public static function make(string $token): Cookie
    {
        return cookie(
            self::name(),
            $token,
            (int) config('sanctum.expiration', 0),   // minutos; 0 = hasta cerrar el navegador
            '/',
            config('auth_cookie.domain'),
            request()->isSecure(),                    // Secure solo si la petición llegó por HTTPS
            true,                                     // HttpOnly: JavaScript no puede leerla
            false,
            config('auth_cookie.same_site', 'lax')
        );
    }

    /**
     * Cookie ya vencida: le dice al navegador que la borre (logout).
     */
    public static function forget(): Cookie
    {
        return cookie()->forget(self::name(), '/', config('auth_cookie.domain'));
    }
}
