import { useState } from 'react';
import { Link, Navigate, useLocation, useNavigate, useSearchParams } from 'react-router-dom';
import { useAuth } from '../AuthContext';
import { fieldError, isGeneralError } from '../api';
import { Alert, Button, Field, ThemeToggle, inputClass } from '../components/ui';

// Pantalla de inicio de sesión y registro (dos pestañas)
export default function Login() {
  const { user, login, register } = useAuth();
  const navigate = useNavigate();
  const location = useLocation();
  const [params] = useSearchParams();

  const [mode, setMode] = useState(params.get('registro') ? 'register' : 'login');
  const [form, setForm] = useState({ name: '', email: '', password: '', password_confirmation: '', terms: false });
  const [error, setError] = useState(null);
  const [loading, setLoading] = useState(false);

  const from = (location.state && location.state.from) || '/dashboard';

  // Si ya hay sesión, no tiene sentido ver el login
  if (user) return <Navigate to={from} replace />;

  const set = (key) => (e) => setForm((f) => ({ ...f, [key]: e.target.value }));

  const changeMode = (next) => {
    setMode(next);
    setError(null);
  };

  const submit = async (e) => {
    e.preventDefault();
    setLoading(true);
    setError(null);
    try {
      if (mode === 'login') {
        await login(form.email, form.password);
      } else {
        await register({
          name: form.name,
          email: form.email,
          password: form.password,
          password_confirmation: form.password_confirmation,
          terms: form.terms,
        });
      }
      navigate(from, { replace: true });
    } catch (err) {
      setError(err);
      setLoading(false);
    }
  };

  const tab = (value, text) => (
    <button
      type="button"
      onClick={() => changeMode(value)}
      className={`flex-1 py-2 rounded-lg font-label-lg text-label-lg transition-all ${
        mode === value ? 'bg-surface-container-lowest text-primary shadow-sm' : 'text-on-surface-variant hover:text-on-surface'
      }`}
    >
      {text}
    </button>
  );

  return (
    <div className="min-h-screen flex items-center justify-center p-space-md">
      <div className="fixed top-3 right-3">
        <ThemeToggle />
      </div>

      <div className="w-full max-w-md bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm">
        <Link to="/" className="flex items-center gap-space-sm mb-space-lg">
          <img alt="logo" className="h-10 w-auto object-contain" src="/logo.png" />
          <span className="font-label-sm text-label-sm text-primary tracking-wide uppercase">Finanzas & Ahorro</span>
        </Link>

        <div className="flex bg-surface-container p-1 rounded-xl mb-space-md">
          {tab('login', 'Iniciar sesión')}
          {tab('register', 'Crear cuenta')}
        </div>

        <form onSubmit={submit} className="flex flex-col gap-space-md">
          {isGeneralError(error) && <Alert>{error.message}</Alert>}

          {mode === 'register' && (
            <Field label="Nombre completo" error={fieldError(error, 'name')}>
              <input className={inputClass} value={form.name} onChange={set('name')} placeholder="Tu nombre" autoComplete="name" />
            </Field>
          )}

          <Field label="Correo electrónico" error={fieldError(error, 'email')}>
            <input className={inputClass} type="email" value={form.email} onChange={set('email')} placeholder="tu@correo.com" autoComplete="email" />
          </Field>

          <Field label="Contraseña" error={fieldError(error, 'password')} hint={mode === 'register' ? 'Mínimo 8 caracteres' : undefined}>
            <input
              className={inputClass}
              type="password"
              value={form.password}
              onChange={set('password')}
              autoComplete={mode === 'login' ? 'current-password' : 'new-password'}
            />
          </Field>

          {mode === 'register' && (
            <>
              <Field label="Repite la contraseña">
                <input
                  className={inputClass}
                  type="password"
                  value={form.password_confirmation}
                  onChange={set('password_confirmation')}
                  autoComplete="new-password"
                />
              </Field>
              <label className="flex items-start gap-space-sm">
                <input
                  type="checkbox"
                  className="mt-1"
                  checked={form.terms}
                  onChange={(e) => setForm((f) => ({ ...f, terms: e.target.checked }))}
                />
                <span className="font-body-sm text-body-sm text-on-surface-variant">Acepto los términos de servicio</span>
              </label>
              {fieldError(error, 'terms') && <span className="font-label-sm text-label-sm text-error">{fieldError(error, 'terms')}</span>}
            </>
          )}

          <Button type="submit" loading={loading} loadingText="Un momento…" className="w-full py-3">
            {mode === 'login' ? 'Entrar' : 'Crear mi cuenta'}
          </Button>
        </form>

        <p className="text-center font-label-md text-label-md text-on-surface-variant mt-space-md">
          ¿Eres administrador?{' '}
          <Link to="/admin/login" className="text-primary hover:underline">
            Entra aquí
          </Link>
        </p>
      </div>
    </div>
  );
}
