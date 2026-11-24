import { createContext, useContext, useEffect, useMemo, useState } from 'react';
import { ApiError, api, hasSession, markSession } from './api';

const AuthContext = createContext(null);

export const useAuth = () => useContext(AuthContext);

// Guarda al usuario conectado y ofrece login, registro y logout a toda la app.
export function AuthProvider({ children }) {
  const [user, setUser] = useState(null);
  const [loading, setLoading] = useState(hasSession());

  // Al abrir la página: si ya hubo un login, la cookie viaja sola y la API responde quién es
  useEffect(() => {
    if (!hasSession()) return;
    api('/user')
      .then((res) => setUser(res.data))
      .catch(() => markSession(false))
      .finally(() => setLoading(false));
  }, []);

  // La API respondió 401: la cookie ya no sirve
  useEffect(() => {
    const expired = () => setUser(null);
    window.addEventListener('auth:expired', expired);
    return () => window.removeEventListener('auth:expired', expired);
  }, []);

  // El backend ya dejó el token en la cookie HttpOnly. Antes de dar la sesión por buena se comprueba que
  // el navegador de verdad la guardó (si no, cada pantalla fallaría con 401 y te sacaría al login).
  const enter = async (res) => {
    try {
      await api('/user');
    } catch (e) {
      if (e.status === 401) {
        // Si la página está dentro de otra (vista previa de un editor, por ejemplo) el navegador bloquea sus cookies
        const embedded = window.self !== window.top;
        // El detalle técnico va a la consola (F12) para quien desarrolla; al usuario se le habla sin tecnicismos
        console.error(`[auth] El login respondió bien pero la API no recibió la cookie de sesión. Página: ${window.location.origin} | API: ${window.location.hostname}:8000 | dentro de un iframe: ${embedded}`);
        throw new ApiError(
          embedded
            ? 'Esta página está abierta dentro de otra aplicación y el navegador bloquea sus cookies. Ábrela directamente en Chrome o Edge.'
            : 'No pudimos iniciar tu sesión. Revisa que tu navegador permita cookies e inténtalo de nuevo.',
          401,
          {}
        );
      }
      throw e;
    }
    markSession(true);
    setUser(res.user);
    return res.user;
  };

  const login = async (email, password) => enter(await api('/login', { method: 'POST', body: { email, password } }));

  const register = async (form) => enter(await api('/register', { method: 'POST', body: form }));

  const adminLogin = async (email, password) => enter(await api('/admin/login', { method: 'POST', body: { email, password } }));

  const logout = async () => {
    try {
      await api('/logout', { method: 'POST' });
    } catch (e) {
      // aunque falle la API, la sesión se cierra en pantalla
    }
    markSession(false);
    setUser(null);
  };

  const value = useMemo(() => ({ user, setUser, loading, login, register, adminLogin, logout }), [user, loading]);

  return <AuthContext.Provider value={value}>{children}</AuthContext.Provider>;
}
