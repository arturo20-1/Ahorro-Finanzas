<?php

/*
|--------------------------------------------------------------------------
| CORS: qué páginas web pueden llamar a esta API
|--------------------------------------------------------------------------
| El frontend (React) corre en otro origen (http://localhost:5173), así que el
| navegador exige que la API lo autorice. Se configura con FRONTEND_URL en .env
| (varios orígenes separados por coma).
*/

return [
    'paths' => ['api/*'],

    'allowed_methods' => ['*'],

    'allowed_origins' => array_values(array_filter(array_map(
        'trim',
        explode(',', (string) env('FRONTEND_URL', 'http://localhost:5173,http://127.0.0.1:5173'))
    ))),

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    // Usamos tokens en la cabecera Authorization, no cookies
    'supports_credentials' => false,
];
