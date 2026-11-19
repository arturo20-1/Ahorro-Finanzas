# Ahorro-Finanzas

App de finanzas personales dividida en **dos proyectos independientes**:

| Carpeta | Qué es | Tecnología | Puerto |
|---|---|---|---|
| `backendFinanza` | API: reglas de negocio y base de datos. **Solo responde JSON** | Laravel + Sanctum | 8000 |
| `frontendFinanza` | Interfaz de usuario | React + Vite | 5173 |

```
 Navegador ──► React (5173) ──fetch + token──► Laravel API (8000) ──► Base de datos
                    ◄────────────── JSON ──────────────┘
```

## Cómo correrlo (dos terminales)

```bash
# Terminal 1 — backend
cd backendFinanza
composer install
cp .env.example .env && php artisan key:generate
php artisan migrate --seed
php artisan serve

# Terminal 2 — frontend
cd frontendFinanza
npm install
cp .env.example .env
npm run dev
```

Abre http://localhost:5173. Administrador de prueba: `admin@example.com` / `password` (entra por `/admin/login`).

Más detalle en `backendFinanza/README.md`, `frontendFinanza/README.md` y `EXPLICACION.md`.
