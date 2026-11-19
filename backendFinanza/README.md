# backendFinanza — API de Ahorro-Finanzas (Laravel)

Backend **solo API**: no devuelve vistas ni HTML, **todas las respuestas son JSON**.
El frontend (React) vive en la carpeta hermana `frontendFinanza` y consume esta API.

## Puesta en marcha

```bash
composer install
cp .env.example .env            # en Windows: copy .env.example .env
php artisan key:generate
php artisan migrate --seed      # tablas + categorías + admin + datos de demostración
php artisan serve               # http://127.0.0.1:8000
```

En el `.env` revisa:

```
APP_ENV=local
APP_DEBUG=true
FRONTEND_URL=http://localhost:5173,http://127.0.0.1:5173   # quién puede llamar a la API (CORS)
```

Usuario administrador de prueba: `admin@example.com` / `password` (lo crea `AdminSeeder`).

## Arquitectura

```
Ruta (routes/api.php) → Middleware (auth:sanctum) → Request (valida) → Controller → Modelo/Servicio → Resource → JSON
```

| Carpeta | Contenido |
|---|---|
| `routes/api.php` | Todas las rutas (prefijo `/api`) |
| `app/Http/Controllers` | Controllers (solo JSON); `Admin/` para el panel de administrador |
| `app/Http/Requests` | Validación y autorización de cada petición |
| `app/Http/Resources` | Formato del JSON de cada modelo |
| `app/Services/TransactionRecorder.php` | Guarda una transacción y ajusta el saldo (todo o nada) |
| `app/Http/Middleware` | `EnsureAdmin` (solo admin) y `RestrictAdminIp` (solo IPs permitidas) |
| `config/cors.php` | Qué frontend puede llamar a la API |

Autenticación: **tokens de Laravel Sanctum**. El login devuelve un `token` que el cliente manda en
`Authorization: Bearer <token>`. Vence a los 7 días y un login nuevo revoca los anteriores.

## Endpoints

Todas las rutas empiezan con `/api`. Enviar siempre `Accept: application/json`.

| Método | Ruta | Descripción | Auth |
|---|---|---|---|
| POST | `/register` | Crear usuario → `{user, token}` | no |
| POST | `/login` | Iniciar sesión → `{user, token}` | no |
| POST | `/logout` | Cerrar sesión (borra el token) | sí |
| GET | `/user` | Usuario actual | sí |
| GET | `/dashboard` | Resumen del mes (balance, ingresos, gastos, recientes…) | sí |
| GET | `/analytics?period=month\|quarter\|year` | Reportes: totales, gasto por categoría, últimos 6 meses | sí |
| GET | `/categories` | Catálogo de categorías | sí |
| GET, POST | `/accounts` | Listar (con resumen y opciones) / crear cuenta | sí |
| GET, PUT, DELETE | `/accounts/{id}` | Ver / editar / eliminar cuenta | sí |
| GET | `/transactions?q=&type=&period=&account_id=&category_id=&page=` | Lista paginada con filtros y totales | sí |
| POST | `/transactions` | Registrar ingreso o gasto (ajusta el saldo) | sí |
| GET | `/transactions/{id}` | Ver una transacción | sí |
| GET, POST | `/budgets` | Listar (con lo gastado) / crear presupuesto | sí |
| PUT, DELETE | `/budgets/{id}` | Editar / eliminar presupuesto | sí |
| GET, POST | `/goals` | Listar / crear meta de ahorro | sí |
| PUT, DELETE | `/goals/{id}` | Editar / eliminar meta | sí |
| POST | `/goals/{id}/contribute` | Abonar fondos a una meta (`amount`) | sí |
| PUT | `/profile` | Cambiar nombre y correo | sí |
| PUT | `/profile/password` | Cambiar contraseña (`current_password`, `password`, `password_confirmation`) | sí |
| POST | `/admin/login` | Login de administrador | no |
| GET | `/admin/summary` | Métricas globales | admin |
| GET | `/admin/users` | Usuarios (paginado) | admin |
| GET, POST | `/admin/categories` | Listar / crear categoría global | admin |

## Códigos de respuesta

- `200` / `201` / `204`: correcto, creado, sin contenido.
- `401`: falta el token o no es válido.
- `404`: no existe, o es de otro usuario (o no eres admin en `/admin`).
- `422`: datos inválidos; el JSON trae `errors` con un mensaje por campo.
- `429`: demasiados intentos (límite por minuto).

## Pruebas

```bash
php artisan test
```
