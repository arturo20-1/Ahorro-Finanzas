// Cliente de la API: todas las pantallas hablan con el backend a través de esta función.
//
// El token de acceso vive en una cookie HttpOnly que pone el backend al iniciar sesión:
// JavaScript no puede leerla, y el navegador la manda sola gracias a credentials: 'include'.

// Por defecto usa el mismo host desde el que abriste la página (localhost o 127.0.0.1),
// porque la cookie solo viaja si el frontend y el backend comparten host.
const API_URL = (import.meta.env.VITE_API_URL || `http://${window.location.hostname}:8000/api`).replace(/\/$/, '');
const SESSION_KEY = 'finanzas_session';

// Solo recuerda (sin ningún secreto) que hubo un login, para no pedir /user a quien nunca entró.
export const hasSession = () => localStorage.getItem(SESSION_KEY) === '1';

export const markSession = (active) => {
  if (active) localStorage.setItem(SESSION_KEY, '1');
  else localStorage.removeItem(SESSION_KEY);
};

// Error de la API: trae el mensaje, el código HTTP y los errores por campo (422)
export class ApiError extends Error {
  constructor(message, status, errors) {
    super(message);
    this.status = status;
    this.errors = errors || {};
  }
}

// Primer mensaje de error de un campo, por ejemplo fieldError(error, 'email')
export const fieldError = (error, field) => (error && error.errors && error.errors[field] ? error.errors[field][0] : undefined);

// true si el error no es de validación de campos (red caída, error del servidor, etc.)
export const isGeneralError = (error) => Boolean(error) && Object.keys(error.errors || {}).length === 0;

export async function api(path, { method = 'GET', body, params } = {}) {
  const url = new URL(API_URL + path);
  Object.entries(params || {}).forEach(([key, value]) => {
    if (value !== '' && value !== null && value !== undefined) url.searchParams.set(key, value);
  });

  const headers = { Accept: 'application/json' };
  if (body !== undefined) headers['Content-Type'] = 'application/json';

  let response;
  try {
    response = await fetch(url, { method, headers, credentials: 'include', body: body !== undefined ? JSON.stringify(body) : undefined });
  } catch (e) {
    throw new ApiError('No se pudo conectar con el servidor. Revisa que el backend esté corriendo.', 0, {});
  }

  if (response.status === 204) return null;

  let data = null;
  try {
    data = await response.json();
  } catch (e) {
    data = null;
  }

  if (!response.ok) {
    // Cookie vencida o token revocado: se avisa para cerrar la sesión en pantalla
    if (response.status === 401) {
      markSession(false);
      window.dispatchEvent(new Event('auth:expired'));
    }
    throw new ApiError((data && data.message) || 'Ocurrió un error inesperado.', response.status, data && data.errors);
  }

  return data;
}
