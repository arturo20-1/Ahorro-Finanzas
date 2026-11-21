import { createContext, useContext, useEffect, useMemo, useState } from 'react';
import { api, hasSession, markSession } from './api';

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

  // El backend ya dejó el token en la cookie HttpOnly; aquí solo se guarda el usuario en pantalla
  const enter = (res) => {
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
