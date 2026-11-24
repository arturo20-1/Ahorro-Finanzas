// Diagnóstico de la sesión con cookie.
// Uso (desde la carpeta Ahorro-Finanzas, con el backend y el frontend corriendo):
//   node diagnostico.mjs
//   node diagnostico.mjs correo@ejemplo.com tuContraseña      (para usar otra cuenta)
// No cambia nada: solo prueba y cuenta qué encuentra. El token nunca se imprime completo.

import { existsSync, readFileSync } from 'node:fs';
import { dirname, join } from 'node:path';
import { fileURLToPath } from 'node:url';

if (Number(process.versions.node.split('.')[0]) < 20) {
  console.log(`Este script necesita Node 20 o más nuevo (tienes ${process.versions.node}). Instala la versión LTS desde nodejs.org.`);
  process.exit(1);
}

const root = dirname(fileURLToPath(import.meta.url));
const email = process.argv[2] || 'juan@gmail.com';
const password = process.argv[3] || 'Ajuan123.';

// Toda petición se corta a los 60 segundos para que el script nunca se quede colgado
const f = (url, opts = {}) => fetch(url, { ...opts, signal: AbortSignal.timeout(60000) });

const ok = (t) => console.log(`  ✔ ${t}`);
const bad = (t) => console.log(`  ✘ ${t}`);
const read = (p) => {
  try {
    return readFileSync(join(root, p), 'utf8');
  } catch (e) {
    return null;
  }
};
const problems = [];
const fail = (msg, hint) => {
  bad(msg);
  problems.push(hint || msg);
};

// ---------------------------------------------------------------- 1) archivos
console.log('\n1) Archivos del backend');
for (const f of ['backendFinanza/app/Support/AuthCookie.php', 'backendFinanza/app/Http/Middleware/TokenFromCookie.php', 'backendFinanza/config/auth_cookie.php']) {
  if (existsSync(join(root, f))) ok(f);
  else fail(`${f} NO existe`, 'Falta aplicar cookies-token.zip al backend (faltan archivos de la cookie).');
}
for (const [file, re, text, hint] of [
  ['backendFinanza/bootstrap/app.php', /TokenFromCookie/, 'bootstrap/app.php registra TokenFromCookie', 'bootstrap/app.php no registra TokenFromCookie: aplica cookies-token.zip.'],
  ['backendFinanza/app/Http/Controllers/AuthController.php', /withCookie/, 'AuthController pone la cookie al iniciar sesión', 'AuthController no pone la cookie: aplica authcontroller-fix.zip (cierra antes las pestañas de VS Code).'],
  ['backendFinanza/app/Http/Controllers/Admin/AdminAuthController.php', /withCookie/, 'AdminAuthController (login de administrador) pone la cookie', 'AdminAuthController no pone la cookie: aplica authcontroller-fix.zip.'],
  ['backendFinanza/config/cors.php', /supports_credentials'\s*=>\s*true/, 'cors.php permite credenciales', 'cors.php no permite credenciales: aplica cookies-token.zip.'],
]) {
  const src = read(file);
  if (src === null) fail(`${file} NO existe`, `${file} no existe.`);
  else if (re.test(src)) ok(text);
  else fail(`${text}: NO`, hint);
}

console.log('\n2) Archivos del frontend');
const vite = read('frontendFinanza/vite.config.js');
if (vite && /proxy/.test(vite)) ok('vite.config.js tiene el proxy hacia el backend');
else fail('vite.config.js NO tiene proxy', 'Falta aplicar proxy-cookie.zip al frontend (y reiniciar npm run dev).');
const api = read('frontendFinanza/src/api.js');
if (api && /return '\/api'/.test(api)) ok("api.js llama a la ruta relativa '/api'");
else fail("api.js NO usa la ruta relativa '/api'", 'Falta aplicar proxy-cookie.zip al frontend (api.js viejo).');
const env = read('frontendFinanza/.env');
if (env && /^\s*VITE_API_URL\s*=/m.test(env)) fail('frontendFinanza/.env define VITE_API_URL', 'Borra frontendFinanza/.env (su VITE_API_URL anula el proxy) y reinicia npm run dev.');
else ok('no hay VITE_API_URL que anule el proxy');

// ---------------------------------------------------------------- 3) recorrido en vivo
async function flow(base, label) {
  console.log(`\n${label}  (${base})`);
  let res;
  const started = Date.now();
  try {
    res = await f(`${base}/api/login`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
      body: JSON.stringify({ email, password }),
    });
  } catch (e) {
    const timeout = e.name === 'TimeoutError';
    fail(timeout ? 'no respondió en 60 segundos' : `no responde (${(e.cause && e.cause.code) || e.message})`, `${label}: ${timeout ? 'no respondió a tiempo (el servidor puede estar colgado: ciérralo con Ctrl+C y vuelve a encenderlo)' : `no responde. ¿Está encendido ${base.includes('5173') ? 'npm run dev' : 'php artisan serve'}?`}`);
    return;
  }
  const text = await res.text();
  let json = null;
  try {
    json = JSON.parse(text);
  } catch (e) {
    json = null;
  }
  if (!res.ok) {
    const detail = (json && json.message) || text.slice(0, 100) || '(sin mensaje)';
    fail(`el login devolvió ${res.status}: ${detail}`, res.status >= 500
      ? `${label}: error ${res.status} dentro del backend. Mira la terminal donde corre "php artisan serve" y las últimas líneas de backendFinanza/storage/logs/laravel.log.`
      : `${label}: el login falla (${res.status}). Revisa el correo y la contraseña de la prueba.`);
    return;
  }
  const secs = (Date.now() - started) / 1000;
  ok(`el login responde ${res.status} (${secs.toFixed(1)} s)`);
  if (secs > 5) console.log('    · tardó mucho: es normal solo en la primera petición tras encender el servidor; si SIEMPRE tarda, revisa el antivirus (excluye la carpeta backendFinanza) o la conexión a PostgreSQL.');

  const cookies = typeof res.headers.getSetCookie === 'function' ? res.headers.getSetCookie() : [];
  const cookie = cookies.find((c) => c.startsWith('finanzas_token='));
  if (!cookie) {
    fail('el login NO envía la cookie finanzas_token', `${label}: el backend no manda la cookie. Aplica cookies-token.zip, corre "php artisan config:clear" y reinicia "php artisan serve".`);
  } else {
    const attrs = cookie.split(';').slice(1).map((a) => a.trim()).join(', ');
    ok(`llega la cookie finanzas_token (${attrs})`);
    if (!/httponly/i.test(cookie)) fail('la cookie no es HttpOnly', 'La cookie no es HttpOnly: revisa AuthCookie.php.');
    if (/;\s*secure/i.test(cookie)) fail('la cookie trae Secure y estás en http', 'La cookie viene marcada Secure y en http el navegador la rechaza: revisa APP_URL / proxies.');
    if (/domain=/i.test(cookie)) fail(`la cookie trae ${cookie.match(/domain=[^;]*/i)[0]}`, 'La cookie trae Domain: borra SESSION_DOMAIN y AUTH_COOKIE_DOMAIN del .env del backend y corre php artisan config:clear.');
  }

  let cookieWorks = null;
  if (cookie) {
    const r = await f(`${base}/api/user`, { headers: { Accept: 'application/json', Cookie: cookie.split(';')[0] } });
    cookieWorks = r.ok;
    if (r.ok) ok('GET /api/user con SOLO la cookie → 200 (la cookie autentica)');
    else fail(`GET /api/user con SOLO la cookie → ${r.status}`, `${label}: el backend no reconoce la cookie.`);
  }

  if (json && json.token) {
    const r = await f(`${base}/api/user`, { headers: { Accept: 'application/json', Authorization: `Bearer ${json.token}` } });
    if (r.ok) ok('GET /api/user con el token en la cabecera → 200 (el token es válido)');
    else fail(`GET /api/user con el token en la cabecera → ${r.status}`, `${label}: el token no es válido (¿config de Sanctum o base de datos?).`);
    if (cookie && cookieWorks === false && r.ok) {
      problems.push(`${label}: el token sirve en la cabecera pero NO desde la cookie → el middleware TokenFromCookie no se está ejecutando. Revisa bootstrap/app.php, corre "php artisan config:clear" y reinicia "php artisan serve".`);
    }
  }
}

console.log('\n3) Recorrido real del login');
{
  // Calienta el backend: la primera petición tras "php artisan serve" puede tardar (carga fría en Windows)
  process.stdout.write('  Calentando el backend (la primera petición puede tardar hasta un minuto)... ');
  const t0 = Date.now();
  try {
    await f('http://127.0.0.1:8000/up');
    console.log(`listo en ${((Date.now() - t0) / 1000).toFixed(1)} s`);
  } catch (e) {
    console.log('sin respuesta');
  }
}
await flow('http://127.0.0.1:8000', 'Directo al backend');
await flow('http://localhost:5173', 'A través del proxy de Vite (como lo hace el navegador)');

// ---------------------------------------------------------------- resultado
console.log('\nResultado');
if (problems.length === 0) {
  ok('El backend y el proxy funcionan: la cookie se envía, se reconoce y autentica.');
  console.log('  → Si el navegador aún falla, el problema es del navegador: prueba en una ventana de incógnito, sin extensiones,');
  console.log('    y comprueba en chrome://settings/cookies que no estén bloqueadas todas las cookies.');
} else {
  [...new Set(problems)].forEach((p) => console.log(`  → ${p}`));
}
console.log('');
