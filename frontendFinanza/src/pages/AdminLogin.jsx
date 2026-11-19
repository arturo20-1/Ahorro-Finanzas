import { useState } from 'react';
import { Link, Navigate, useNavigate } from 'react-router-dom';
import { useAuth } from '../AuthContext';
import { fieldError, isGeneralError } from '../api';
import { Alert, Button, Field, Icon, ThemeToggle, inputClass } from '../components/ui';

// Acceso al panel de administrador (solo usuarios con is_admin)
export default function AdminLogin() {
  const { user, adminLogin } = useAuth();
  const navigate = useNavigate();
  const [form, setForm] = useState({ email: '', password: '' });
  const [error, setError] = useState(null);
  const [loading, setLoading] = useState(false);

  if (user && user.is_admin) return <Navigate to="/admin" replace />;

  const set = (key) => (e) => setForm((f) => ({ ...f, [key]: e.target.value }));

  const submit = async (e) => {
    e.preventDefault();
    setLoading(true);
    setError(null);
    try {
      await adminLogin(form.email, form.password);
      navigate('/admin', { replace: true });
    } catch (err) {
      setError(err);
      setLoading(false);
    }
  };

  return (
    <div className="min-h-screen flex items-center justify-center p-space-md">
      <div className="fixed top-3 right-3">
        <ThemeToggle />
      </div>

      <div className="w-full max-w-md bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm">
        <div className="flex items-center gap-space-sm mb-space-lg">
          <img alt="logo" className="h-10 w-auto object-contain" src="/logo.png" />
          <div>
            <h1 className="font-headline-sm text-headline-sm text-on-surface">Acceso administrador</h1>
            <p className="font-body-sm text-body-sm text-on-surface-variant">Panel de gestión de categorías y clientes</p>
          </div>
        </div>

        <form onSubmit={submit} className="flex flex-col gap-space-md">
          {isGeneralError(error) && <Alert>{error.message}</Alert>}
          {fieldError(error, 'email') && <Alert>{fieldError(error, 'email')}</Alert>}

          <Field label="Correo electrónico">
            <input className={inputClass} type="email" value={form.email} onChange={set('email')} autoComplete="email" />
          </Field>
          <Field label="Contraseña">
            <input className={inputClass} type="password" value={form.password} onChange={set('password')} autoComplete="current-password" />
          </Field>

          <Button type="submit" loading={loading} loadingText="Un momento…" className="w-full py-3">
            <Icon name="admin_panel_settings" className="text-[20px]" />
            Entrar al panel
          </Button>
        </form>

        <p className="text-center font-label-md text-label-md text-on-surface-variant mt-space-md">
          ¿Eres cliente?{' '}
          <Link to="/login" className="text-primary hover:underline">
            Inicia sesión aquí
          </Link>
        </p>
      </div>
    </div>
  );
}
