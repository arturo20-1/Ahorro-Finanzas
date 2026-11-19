<?php

return [

    /*
    |--------------------------------------------------------------------------
    | IPs permitidas para el panel de administrador
    |--------------------------------------------------------------------------
    |
    | Lista separada por comas en el archivo .env. Acepta IPv4, IPv6 y rangos
    | CIDR. Ejemplo:
    |
    |   ADMIN_ALLOWED_IPS=127.0.0.1,::1,203.0.113.10,192.168.1.0/24
    |
    | Si la lista está vacía, el panel solo se puede abrir en entornos "local"
    | y "testing"; en producción queda bloqueado para todos.
    |
    */

    'allowed_ips' => array_values(array_filter(array_map(
        'trim',
        explode(',', (string) env('ADMIN_ALLOWED_IPS', ''))
    ))),

];
