import { createContext, useContext, useEffect, useMemo, useState } from 'react';
import { api, getToken, setToken } from './api';

const AuthContext = createContext(null);

export const useAuth = () => useContext(AuthContext);

// Guarda al usuario conectado y ofrece login, registro y logout a toda la app.
export function AuthProvider({ children }) {
  const [user, setUser] = useState(null);
  const [loading, setLoading] = useState(Boolean(getToken()));

  // Al abrir la página: si hay un token guardado, pregunta a la API quién es
  useEffect(() => {
    if (!getToken()) return;
    api('/user')
      .then((res) => setUser(res.data))
      .catch(() => setToken(null))
      .finally(() => setLoading(false));
  }, []);

  // La API respondió 401: el token ya no sirve
  useEffect(() => {
    const expired = () => setUser(null);
    window.addEventListener('auth:expired', expired);
    return () => window.removeEventListener('auth:expired', expired);
  }, []);

  const enter = (res) => {
    setToken(res.token);
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
      // aunque falle la API, la sesión se cierra en el navegador
    }
    setToken(null);
    setUser(null);
  };

  const value = useMemo(() => ({ user, setUser, loading, login, register, adminLogin, logout }), [user, loading]);

  return <AuthContext.Provider value={value}>{children}</AuthContext.Provider>;
}
