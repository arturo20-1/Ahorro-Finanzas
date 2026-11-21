<?php

/*
|--------------------------------------------------------------------------
| Cookie del token de acceso
|--------------------------------------------------------------------------
| El login guarda el token de Sanctum en una cookie HttpOnly (JavaScript no puede leerla).
| El navegador la manda sola en cada petición y el middleware TokenFromCookie la convierte
| en la cabecera Authorization, así las rutas con auth:sanctum funcionan igual.
*/

return [
    'name' => env('AUTH_COOKIE_NAME', 'finanzas_token'),

    // lax: la cookie solo viaja entre sitios "hermanos" (localhost:5173 -> localhost:8000) y frena CSRF.
    // Si el frontend y el backend se publican en dominios distintos, usa 'none' (exige HTTPS).
    'same_site' => env('AUTH_COOKIE_SAMESITE', 'lax'),

    // Normalmente null (la cookie queda para el dominio del backend)
    'domain' => env('AUTH_COOKIE_DOMAIN'),
];
