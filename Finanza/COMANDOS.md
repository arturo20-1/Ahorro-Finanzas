# Comandos del proyecto Ahorro-Finanzas

Todos los comandos se ejecutan **dentro de la carpeta `Finanza`** (donde está el archivo `artisan`).
Los de `curl.exe` están escritos para **PowerShell** (Windows).

---

## 1. Preparar el proyecto

```powershell
composer install                              # instala las dependencias
php artisan migrate                            # crea las tablas (incluye personal_access_tokens de Sanctum)
php artisan db:seed --class=AdminSeeder        # crea el admin: admin@example.com / password
php artisan serve                              # levanta el servidor en http://127.0.0.1:8000
```

Si `migrate` pregunta "APPLICATION IN PRODUCTION", cambia en el `.env`:

```
APP_ENV=local
APP_DEBUG=true
```

y después limpia la configuración:

```powershell
php artisan config:clear
```

> Nunca uses `php artisan migrate:fresh` si tienes datos que quieres conservar: borra todas las tablas.

---

## 2. Rutas

```powershell
php artisan route:list --except-vendor        # todas las rutas del proyecto
php artisan route:list --name=accounts        # las rutas de cuentas (las crea Route::resource)
php artisan route:list --path=cuentas         # las rutas web de cuentas
php artisan route:list --path=login -v        # login, con su middleware (guest, throttle)
php artisan route:list --path=api -v          # la API, con controller y middleware (auth:sanctum)
```

Rutas en caché (para producción):

```powershell
php artisan route:cache                        # guarda las rutas en caché (falla si hay rutas con función anónima)
php artisan route:clear                        # borra esa caché (úsalo siempre al terminar de probar)
```

---

## 3. Autenticación

### Mostrar que la contraseña es un hash

```powershell
php artisan tinker
```

Dentro de tinker (cambia `'password'` por la clave real del usuario):

```php
$u = App\Models\User::first();
$u->email;                                   // el correo
$u->password;                                // se ve el hash, no la contraseña
Hash::check('password', $u->password);       // true o false
Hash::make('password');                      // otro hash distinto cada vez
exit
```

### Preparación para la API: login y guardar el token en una variable

```powershell
$T = (curl.exe -s -X POST http://127.0.0.1:8000/api/login -H "Accept: application/json" -d "email=TU_CORREO&password=TU_CLAVE" | ConvertFrom-Json).token
```

Cambia el correo y la clave por los de un usuario normal. La variable `$T` se usa en todos los comandos siguientes.

### Sin token (401) y con token (200)

```powershell
curl.exe http://127.0.0.1:8000/api/accounts -H "Accept: application/json"
curl.exe http://127.0.0.1:8000/api/accounts -H "Accept: application/json" -H "Authorization: Bearer $T"
```

### Registro y cierre de sesión por API

```powershell
curl.exe -X POST http://127.0.0.1:8000/api/register -H "Accept: application/json" -d "name=Ana&email=ana@test.com&password=12345678&password_confirmation=12345678"
curl.exe -X POST http://127.0.0.1:8000/api/logout -H "Accept: application/json" -H "Authorization: Bearer $T"
```

### Ver el token guardado en la base de datos (solo queda el hash)

```powershell
php artisan tinker
```

```php
DB::table('personal_access_tokens')->get(['id', 'name', 'token', 'expires_at']);
exit
```

### Límite de intentos (throttle)

```powershell
1..7 | % { curl.exe -s -o NUL -w "%{http_code}`n" -X POST http://127.0.0.1:8000/api/login -H "Accept: application/json" -d "email=x@x.com&password=mal" }
```

Debe imprimir `422` seis veces y `429` en la séptima. Espera un minuto antes de repetirlo.
Para la web: equivócate 6 veces seguidas en `/login` desde el navegador y la sexta da error 429.

### Sesión y cookie (sin comandos)

En el navegador, con el login abierto, pulsa **F12**:

- **Network**: inicia sesión y mira la petición `login` (responde 302 con `Set-Cookie`).
- **Application → Cookies**: ahí está la cookie de sesión.

---

## 4. Requests (validación)

Datos inválidos: la API responde **422** con los mensajes en español.

```powershell
curl.exe -X POST http://127.0.0.1:8000/api/accounts -H "Accept: application/json" -H "Authorization: Bearer $T" -d "name=&type=inventado&balance=abc&currency=XXX"
curl.exe -X POST http://127.0.0.1:8000/api/register -H "Accept: application/json" -d "name=Ana&email=ana@test.com&password=12345678&password_confirmation=otra"
```

Una cuenta que no es tuya (o no existe) responde **404**:

```powershell
curl.exe -X PUT http://127.0.0.1:8000/api/accounts/9999 -H "Accept: application/json" -H "Authorization: Bearer $T" -d "name=x&type=cash&balance=1&currency=USD"
```

Crear un Request de ejemplo (enseña el archivo y bórralo después):

```powershell
php artisan make:request EjemploRequest
```

Se crea en `app/Http/Requests/EjemploRequest.php`.

---

## 5. Controllers: crear una transacción y ver que el saldo cambia

Valores válidos: `type` de cuenta = `checking`, `savings`, `cash` o `credit`; moneda = `USD`, `MXN`, `EUR`, `COP`, `PEN`, `ARS` o `CLP`; tipo de transacción = `income` o `expense`.

```powershell
# 1) Crear una cuenta con 100
curl.exe -X POST http://127.0.0.1:8000/api/accounts -H "Accept: application/json" -H "Authorization: Bearer $T" -d "name=Demo&type=cash&balance=100&currency=USD"

# 2) Ver categorías y cuentas para saber los ids
curl.exe http://127.0.0.1:8000/api/categories -H "Accept: application/json" -H "Authorization: Bearer $T"
curl.exe http://127.0.0.1:8000/api/accounts -H "Accept: application/json" -H "Authorization: Bearer $T"

# 3) Registrar un gasto de 30 (categoría de tipo expense y el id de la cuenta Demo)
curl.exe -X POST http://127.0.0.1:8000/api/transactions -H "Accept: application/json" -H "Authorization: Bearer $T" -d "type=expense&amount=30&description=Almuerzo&category_id=ID_CATEGORIA&account_id=ID_CUENTA&transaction_date=2026-11-17"

# 4) Ver la cuenta otra vez: el saldo debe ser 70
curl.exe http://127.0.0.1:8000/api/accounts/ID_CUENTA -H "Accept: application/json" -H "Authorization: Bearer $T"
```

Cambia `ID_CATEGORIA` e `ID_CUENTA` por los ids reales, y la fecha por la de hoy o una anterior (no puede ser futura).
Si usas una categoría de tipo `income` en un gasto, responde 422 por la validación extra de `StoreTransactionRequest`.

Otros endpoints de la API:

```powershell
curl.exe http://127.0.0.1:8000/api/budgets -H "Accept: application/json" -H "Authorization: Bearer $T"
curl.exe http://127.0.0.1:8000/api/goals -H "Accept: application/json" -H "Authorization: Bearer $T"
curl.exe -X DELETE http://127.0.0.1:8000/api/accounts/ID_CUENTA -H "Accept: application/json" -H "Authorization: Bearer $T"
```

---

## 6. Resources

Comparar el modelo crudo contra el Resource:

```powershell
php artisan tinker
```

```php
$a = App\Models\Account::first();
$a->toArray();                                              // lo que hay en la base de datos
(new App\Http\Resources\AccountResource($a))->resolve();    // lo que ve el cliente
$u = App\Models\User::first();
(new App\Http\Resources\UserResource($u))->resolve();       // sin contraseña
exit
```

En la API:

```powershell
curl.exe http://127.0.0.1:8000/api/user -H "Accept: application/json" -H "Authorization: Bearer $T"
curl.exe "http://127.0.0.1:8000/api/transactions?type=expense" -H "Accept: application/json" -H "Authorization: Bearer $T"
```

Fíjate en que la lista viene dentro de `data`, con `links` y `meta` de paginación.

Para que el JSON se lea bien, agrega esto al final de cualquier comando `curl.exe`:

```powershell
| ConvertFrom-Json | ConvertTo-Json -Depth 5
```

---

## 7. Otros comandos útiles

```powershell
php artisan test                               # corre los tests
php artisan config:clear                       # limpia la caché de configuración (después de cambiar el .env)
php artisan cache:clear                        # limpia la caché de la aplicación
php artisan view:clear                         # limpia las vistas compiladas
php artisan optimize:clear                     # limpia todas las cachés de una vez
php artisan about                              # versión de Laravel, PHP y entorno
```

---

## 8. Orden sugerido para la demostración

1. `php artisan route:list --path=api -v` (las rutas y su middleware).
2. Login en el navegador y **F12** (la cookie de sesión).
3. `php artisan tinker` con el hash de la contraseña.
4. `curl.exe` sin token (401), con login y con token (200).
5. Datos inválidos (422) y la creación de una transacción con el saldo cambiando.
6. El límite de intentos (429).
