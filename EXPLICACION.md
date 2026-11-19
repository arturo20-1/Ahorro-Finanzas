# Explicación del proyecto (para exponer)

## Cambios que pidió el profesor

1. **Los controllers no retornan vistas: retornan JSON.** Ya no existe ninguna vista Blade ni redirección.
   Cada controller devuelve datos (con un *Resource* o un arreglo) y el código HTTP correcto (200, 201, 204, 404, 422…).
2. **El proyecto se divide en backend y frontend.** `backendFinanza` es Laravel (solo API) y `frontendFinanza` es React.
   Se comunican por HTTP: React pide datos con `fetch` y Laravel responde JSON.

```
React (pantalla) → fetch con token → Ruta → Middleware (auth) → Request (valida) → Controller → Modelo → Resource → JSON → React
```

## 1. Rutas — `backendFinanza/routes/api.php`
- Un solo archivo de rutas, con prefijo `/api`. Ya no hay `web.php`.
- `Route::apiResource('accounts', ...)` crea index, store, show, update y destroy en una línea (sin `create`/`edit`: esas pantallas ahora viven en React).
- Grupos con middleware: `auth:sanctum` (necesita token), `admin.ip` + `admin` (panel de administrador).
- `throttle` limita intentos por minuto en login y registro.
- En React las "rutas" son las pantallas (`frontendFinanza/src/App.jsx`), protegidas con `RequireAuth` y `RequireAdmin`.

## 2. Autenticación — tokens con Sanctum
- `POST /api/login` valida y devuelve `{ user, token }`. El token se guarda en el navegador (`localStorage`).
- React lo manda en cada petición: `Authorization: Bearer <token>` (`src/api.js`).
- Las rutas protegidas usan `auth:sanctum`; sin token responden **401** y React vuelve al login.
- Los tokens vencen a los 7 días y un login nuevo revoca los anteriores. La contraseña se guarda con hash.
- Panel admin: `POST /api/admin/login` solo acepta `is_admin`; sus rutas exigen IP permitida y rol admin (si no, 404).
- **Autenticación** = quién eres (token). **Autorización** = qué puedes hacer (tus datos, o admin).

## 3. Request — `app/Http/Requests`
Clases que **validan** (`rules`, `messages`) y **autorizan** (`authorize`) cada petición antes del controller.
`LoginRequest`, `RegisterRequest`, `AccountRequest`, `StoreTransactionRequest`, `BudgetRequest`, `GoalRequest`,
`GoalContributionRequest`, `UpdateProfileRequest`, `UpdatePasswordRequest`, `CategoryRequest`.
- Si falla: la API responde **422** con `errors` por campo; React lo muestra bajo cada campo.
- `authorize()` comprueba que el registro sea del usuario (si no, 404).
- `after()` permite validaciones extra (la categoría debe ser del mismo tipo que la transacción).

## 4. Controllers — `app/Http/Controllers`
Todos devuelven JSON. Delgados: validan con Request, usan modelos y responden con Resource.
`AuthController`, `DashboardController`, `AccountController`, `TransactionController`, `BudgetController`,
`GoalController`, `AnalyticsController`, `ProfileController`, `CategoryController` y `Admin/*`.
- `TransactionController::store` usa `App\Services\TransactionRecorder`: guarda la transacción y ajusta el saldo en una
  transacción de base de datos (todo o nada).

## 5. Resources — `app/Http/Resources`
Convierten un modelo en el JSON que ve el cliente: eligen campos (`UserResource` nunca muestra la contraseña),
dan formato (números, fechas) e incluyen relaciones solo si se cargaron (`whenLoaded`). Las listas salen en `data`
(con `links` y `meta` si son paginadas).

## Qué hace React (frontend)
Muestra pantallas y formularios; no tiene reglas de negocio. `api.js` envía el token y convierte errores;
`AuthContext` guarda el usuario; `useFetch` pide datos; cada página arma su pantalla con los datos del JSON.

## Frase final
> "El backend en Laravel solo expone una API JSON: rutas, autenticación con tokens, requests que validan, controllers
> que responden JSON y resources que dan formato. El frontend en React consume esa API con el token y dibuja las pantallas."
