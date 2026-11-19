// Cliente de la API: todas las pantallas hablan con el backend a través de esta función.

const API_URL = (import.meta.env.VITE_API_URL || 'http://127.0.0.1:8000/api').replace(/\/$/, '');
const TOKEN_KEY = 'finanzas_token';

export const getToken = () => localStorage.getItem(TOKEN_KEY);

export const setToken = (token) => {
  if (token) localStorage.setItem(TOKEN_KEY, token);
  else localStorage.removeItem(TOKEN_KEY);
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

  const token = getToken();
  const headers = { Accept: 'application/json' };
  if (body !== undefined) headers['Content-Type'] = 'application/json';
  if (token) headers.Authorization = `Bearer ${token}`;

  let response;
  try {
    response = await fetch(url, { method, headers, body: body !== undefined ? JSON.stringify(body) : undefined });
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
    // Token vencido o revocado: se avisa para cerrar la sesión en pantalla
    if (response.status === 401 && token) {
      setToken(null);
      window.dispatchEvent(new Event('auth:expired'));
    }
    throw new ApiError((data && data.message) || 'Ocurrió un error inesperado.', response.status, data && data.errors);
  }

  return data;
}
