# Explicación del proyecto: Ahorro-Finanzas (Laravel)

Esta guía recorre los 5 puntos que pidió el profesor: **Autenticación, Controllers, Rutas, Resources y Request**.
Para cada uno: qué es, dónde está en el proyecto y cómo funciona aquí.

> **Idea general (el recorrido de una petición):**
> `Ruta → Middleware → Request (valida) → Controller → Modelo/Servicio → Resource (JSON) o Vista (HTML)`

---

## 1. Rutas (`routes/`)

Una **ruta** une una dirección (URL) + un método HTTP con el código que la atiende.

| Archivo | Para qué sirve |
|---|---|
| `routes/web.php` | Páginas con vistas Blade. Usan **sesión y cookies**. |
| `routes/api.php` | API que responde **JSON**. Usan **tokens**. Laravel les agrega el prefijo `/api`. |

**En el proyecto:**

- **Grupos con middleware:** `Route::middleware('guest')` (solo quien NO ha iniciado sesión: login/registro) y `Route::middleware('auth')` (solo quien SÍ: dashboard, cuentas, transacciones…).
- **Panel admin:** `Route::prefix('admin')` con los middleware `RestrictAdminIp` y `EnsureAdmin`.
- **Nombres de ruta** (`->name('dashboard')`): permiten usar `route('dashboard')` en vez de escribir la URL a mano.
- **`Route::resource`** (web, cuentas): en una sola línea crea `index`, `store`, `update` y `destroy`.
  ```php
  Route::resource('cuentas', AccountController::class)
      ->only(['index', 'store', 'update', 'destroy'])
      ->parameters(['cuentas' => 'account'])->names('accounts');
  ```
- **`Route::apiResource`** (API): igual, pero sin `create`/`edit` (esas son pantallas, no existen en una API).
- **Route Model Binding:** en `/cuentas/{account}` Laravel busca solo la `Account` con ese id y la entrega al controller como `Account $account`.

Comando útil para mostrarlo: `php artisan route:list`

---

## 2. Autenticación

Hay **dos formas**, según quién consume la app:

### a) Web (sesión + cookie) — `AuthController`
1. `POST /login` → `LoginRequest` valida → `Auth::attempt($credenciales)` compara contra la base de datos (la contraseña se compara con su hash).
2. Si es correcto: `$request->session()->regenerate()` (evita *session fixation*) y redirige al dashboard.
3. `POST /registro` → `RegisterRequest` valida → `User::create(...)`. La contraseña se cifra sola por el cast `'password' => 'hashed'` del modelo `User`.
4. `POST /logout` → `Auth::logout()`, `session()->invalidate()` y `regenerateToken()`.

### b) API (token con Laravel Sanctum) — `Api\AuthController`
1. `POST /api/register` o `POST /api/login` devuelven un **token**: `$usuario->createToken('api')->plainTextToken`.
2. El cliente lo manda en cada petición: `Authorization: Bearer <token>`.
3. Las rutas protegidas usan el middleware `auth:sanctum`.
4. `POST /api/logout` borra solo el token usado.
5. Para que el modelo pueda crear tokens se agregó el trait `HasApiTokens` a `User`.

### Panel de administrador (autorización)
- `AdminAuthController`: login que solo acepta usuarios con `is_admin = true`.
- `RestrictAdminIp`: solo deja entrar desde las IPs de `config/admin.php`.
- `EnsureAdmin`: si no eres admin responde **404** (como si el panel no existiera).

### Seguridad extra del proyecto
- Contraseñas con hash (nunca en texto plano).
- Protección CSRF automática en formularios web (`@csrf`).
- `throttle` (límite de intentos) en `/api/login` y `/api/register`.
- Cada usuario solo ve sus datos: los controllers filtran por `user_id` y devuelven 404 si la cuenta es de otro.

---

## 3. Request (`app/Http/Requests/`)

Un **Form Request** es una clase dedicada a **validar (y autorizar)** una petición, para que el controller no se llene de reglas.
Se crea con `php artisan make:request NombreRequest`.

Cada una tiene:
- `authorize()`: ¿puede este usuario hacer esto? (`true` = sí)
- `rules()`: reglas de validación.
- `messages()`: mensajes de error en español.

| Clase | Valida | La usan |
|---|---|---|
| `LoginRequest` | email y contraseña | `AuthController` (web) y `Api\AuthController` |
| `RegisterRequest` | nombre, email único, contraseña confirmada (mín. 8), términos | web y API |
| `AccountRequest` | nombre único por usuario, tipo, saldo, moneda | crear y editar cuenta (web y API) |
| `StoreTransactionRequest` | tipo, importe > 0, categoría, cuenta propia, fecha no futura | web y API |

**Detalles para destacar:**
- Si la validación falla, Laravel redirige con los errores (web) o responde **422 con JSON** (API), sin escribir código extra.
- En el controller solo se usa `$request->validated()`: devuelve **únicamente** los campos que pasaron las reglas.
- `StoreTransactionRequest::after()` hace una validación extra: la **categoría debe ser del mismo tipo** (ingreso/gasto) que la transacción.
- Una misma Request se **reutiliza** en web y API (se adapta con `$this->is('api/*')`).

---

## 4. Controllers (`app/Http/Controllers/`)

Un **controller** recibe la petición ya validada, usa los modelos y decide qué responder.

**Web (devuelven vistas / redirecciones):**

| Controller | Qué hace |
|---|---|
| `AuthController` | login, registro, logout |
| `DashboardController` | calcula balance, ingresos/gastos del mes, comparación con el mes anterior |
| `AccountController` | CRUD de cuentas con saldo y movimiento del mes |
| `TransactionController` | lista con filtros + guarda transacciones (anti doble envío con un token) |
| `AdminAuthController`, `AdminController` | login y panel admin |
| `Budget`/`Goal`/`Settings`/`Analytics` | por ahora solo muestran su vista (pantallas estáticas) |

**API (devuelven JSON), carpeta `Api/`:** `AuthController`, `AccountController` (CRUD completo), `TransactionController` (index/store/show), `CategoryController`, `BudgetController`, `GoalController`.

**Buenas prácticas aplicadas:**
- Controllers delgados: validación en **Requests**, formato de salida en **Resources**.
- La lógica de "guardar transacción + actualizar saldo" está en un solo lugar: `app/Services/TransactionRecorder.php`. Usa `DB::transaction` (o se guarda todo o nada) y `lockForUpdate` (evita que dos movimientos simultáneos corrompan el saldo). La usan el controller web y el de la API.

---

## 5. Resources (`app/Http/Resources/`)

Un **API Resource** (`JsonResource`) es la capa que **transforma un modelo en el JSON que ve el cliente**. Se crea con `php artisan make:resource NombreResource`.

¿Para qué?
- Elegir qué campos se exponen (por ejemplo, `UserResource` **nunca** muestra la contraseña).
- Dar formato (`balance` como número, fechas en ISO 8601, `progress` de una meta en %).
- Incluir relaciones solo si fueron cargadas: `whenLoaded('category')`, `whenCounted('transactions')`.

Clases: `UserResource`, `AccountResource`, `CategoryResource`, `TransactionResource` (anida categoría y cuenta), `BudgetResource`, `GoalResource`.

Uso en el controller:
```php
return new AccountResource($cuenta);              // un registro
return AccountResource::collection($cuentas);     // una lista
return TransactionResource::collection($paginado);// lista paginada (agrega links y meta)
```

---

## Cómo probar la API (ejemplos con curl)

```bash
# 1) Registrarse (devuelve user + token)
curl -X POST http://localhost:8000/api/register -H "Accept: application/json" \
  -d "name=Ana&email=ana@test.com&password=12345678&password_confirmation=12345678"

# 2) Iniciar sesión
curl -X POST http://localhost:8000/api/login -H "Accept: application/json" \
  -d "email=ana@test.com&password=12345678"

# 3) Usar el token (cambia TOKEN por el que recibiste)
curl http://localhost:8000/api/accounts -H "Accept: application/json" -H "Authorization: Bearer TOKEN"

# 4) Crear cuenta
curl -X POST http://localhost:8000/api/accounts -H "Accept: application/json" -H "Authorization: Bearer TOKEN" \
  -d "name=Ahorros&type=savings&balance=500&currency=USD"

# 5) Crear transacción (ver ids con GET /api/categories)
curl -X POST http://localhost:8000/api/transactions -H "Accept: application/json" -H "Authorization: Bearer TOKEN" \
  -d "type=expense&amount=25.50&description=Almuerzo&category_id=1&account_id=1&transaction_date=2026-11-16"
```

Endpoints de la API: `POST /api/register`, `POST /api/login`, `POST /api/logout`, `GET /api/user`,
`GET|POST /api/accounts`, `GET|PUT|DELETE /api/accounts/{id}`, `GET|POST /api/transactions`, `GET /api/transactions/{id}`,
`GET /api/categories`, `GET /api/budgets`, `GET /api/goals`.

## Cómo ejecutar el proyecto

```bash
composer install
php artisan migrate --seed     # crea tablas (incluye personal_access_tokens de Sanctum) y datos
php artisan serve
php artisan route:list         # ver todas las rutas
```

## Resumen para decir en voz alta

> "La petición entra por una **ruta**, pasa por **middleware** (por ejemplo `auth`, que es la **autenticación**), un **Request** valida los datos, el **Controller** hace la lógica con los modelos y responde con una **vista** (web) o con un **Resource** en JSON (API)."
