# frontendFinanza — Interfaz de Ahorro-Finanzas (React)

Frontend hecho con **React + Vite**. No tiene lógica de negocio: muestra pantallas y le pide los datos a la API
de `backendFinanza` (Laravel), que responde siempre en JSON.

## Puesta en marcha

```bash
npm install
npm run dev                 # http://localhost:5173
```

No hace falta ningún `.env` en desarrollo. El backend debe estar corriendo (`php artisan serve`, por defecto en
`http://127.0.0.1:8000`); si usa otra dirección, cámbiala en `vite.config.js` (constante `BACKEND`).

## Estructura

```
src/
├── main.jsx            Arranque: Router + AuthProvider
├── App.jsx             Rutas de la app y protección (RequireAuth / RequireAdmin)
├── api.js              Cliente de la API: manda el token y traduce los errores
├── AuthContext.jsx     Usuario conectado: login, registro y logout
├── lib/                format.js (dinero y fechas) y hooks.js (useFetch)
├── components/         Layout (menú lateral), TxItem y ui.jsx (botones, tarjetas, modal…)
└── pages/              Welcome, Login, AdminLogin, Dashboard, Transacciones, Presupuestos,
                        Metas, Reportes, Cuentas, Configuración y Admin
```

## Cómo habla con el backend

1. El login (`POST /api/login`) hace que el backend deje el token en una **cookie HttpOnly**: JavaScript no puede leerla.
2. `api.js` usa `credentials: 'include'`, así que el navegador manda la cookie solo en cada petición.
3. Al abrir la página, `AuthContext` pregunta `GET /api/user` y la cookie dice quién eres.
4. Si la API responde `401` (cookie vencida), la app cierra la sesión y vuelve al login.
5. Si responde `422` (datos inválidos), el formulario muestra el mensaje debajo de cada campo.

> En desarrollo, Vite reenvía todo lo que empiece con `/api` al backend (`vite.config.js`, proxy). Así el navegador ve
> una sola dirección (`http://localhost:5173`) y la cookie funciona sin reglas de CORS. El backend debe estar corriendo
> en `http://127.0.0.1:8000`. En producción, sirve la API bajo el mismo dominio o define `VITE_API_URL`.

## Pantallas

| Ruta | Pantalla | Endpoint principal |
|---|---|---|
| `/` | Inicio | — |
| `/login` | Iniciar sesión / crear cuenta | `POST /login`, `POST /register` |
| `/dashboard` | Resumen del mes | `GET /dashboard` |
| `/transacciones` | Lista con filtros y registro | `GET/POST /transactions` |
| `/presupuestos` | Límites por categoría | `/budgets` |
| `/metas` | Metas de ahorro y abonos | `/goals` |
| `/reportes` | Gráficos y desglose | `GET /analytics` |
| `/cuentas` | Cuentas bancarias | `/accounts` |
| `/configuracion` | Perfil y contraseña | `PUT /profile`, `PUT /profile/password` |
| `/admin/login`, `/admin` | Panel de administrador | `/admin/*` |

El diseño (colores, tipografía y modo oscuro) es el mismo de la versión anterior: usa Tailwind por CDN
configurado en `index.html`.
