import { useRef, useState } from 'react';
import { Link, Navigate, useNavigate } from 'react-router-dom';
import { useAuth } from '../AuthContext';
import { fieldError, isGeneralError } from '../api';
import { Alert, Icon } from '../components/ui';
import AuthScene, { AuthField } from '../components/AuthScene';

// Acceso al panel de administrador (solo usuarios con is_admin). Usa la misma escena del login.
export default function AdminLogin() {
  const { user, adminLogin } = useAuth();
  const navigate = useNavigate();
  const [form, setForm] = useState({ email: '', password: '' });
  const [error, setError] = useState(null);
  const [loading, setLoading] = useState(false);
  const [success, setSuccess] = useState(false);
  const [shake, setShake] = useState(false);
  const [focus, setFocus] = useState(null);
  const [showPass, setShowPass] = useState(false);
  const holdRedirect = useRef(false);

  if (user && user.is_admin && !holdRedirect.current) return <Navigate to="/admin" replace />;

  const set = (key) => (e) => setForm((f) => ({ ...f, [key]: e.target.value }));
  const bind = (name) => ({ onFocus: () => setFocus(name), onBlur: () => setFocus(null) });

  const submit = async (e) => {
    e.preventDefault();
    setLoading(true);
    setError(null);
    holdRedirect.current = true;
    try {
      await adminLogin(form.email, form.password);
      setLoading(false);
      setSuccess(true);
      setTimeout(() => navigate('/admin', { replace: true }), 900);
    } catch (err) {
      holdRedirect.current = false;
      setError(err);
      setLoading(false);
      setShake(true);
      setTimeout(() => setShake(false), 600);
    }
  };

  let icon = 'admin_panel_settings';
  if (focus === 'email') icon = 'mail';
  if (focus === 'password') icon = showPass ? 'lock_open' : 'lock';
  let status = 'idle';
  if (error && !focus) {
    icon = 'error';
    status = 'error';
  }
  if (loading) {
    icon = 'progress_activity';
    status = 'busy';
  }
  if (success) {
    icon = 'check_circle';
    status = 'success';
  }

  const eye = (
    <button type="button" tabIndex={-1} className="auth-eye" aria-label={showPass ? 'Ocultar contraseña' : 'Mostrar contraseña'} onClick={() => setShowPass((v) => !v)}>
      <Icon name={showPass ? 'visibility_off' : 'visibility'} className="text-[20px]" />
    </button>
  );

  return (
    <AuthScene icon={icon} spin={loading} status={status} title="Acceso administrador" subtitle="Panel de gestión de categorías y clientes">
      <div className={shake ? 'auth-shake' : ''}>
        <form onSubmit={submit} noValidate className="flex flex-col gap-space-lg">
          {isGeneralError(error) && <Alert>{error.message}</Alert>}

          <AuthField icon="mail" error={fieldError(error, 'email')}>
            <input
              className="auth-input font-body-md text-body-md"
              type="email"
              aria-label="Correo electrónico"
              placeholder="Correo electrónico"
              autoComplete="email"
              value={form.email}
              onChange={set('email')}
              {...bind('email')}
            />
          </AuthField>

          <AuthField icon="lock" right={eye}>
            <input
              className="auth-input font-body-md text-body-md"
              type={showPass ? 'text' : 'password'}
              aria-label="Contraseña"
              placeholder="Contraseña"
              autoComplete="current-password"
              value={form.password}
              onChange={set('password')}
              {...bind('password')}
            />
          </AuthField>

          <button type="submit" className="auth-button font-label-lg text-label-lg" disabled={loading || success}>
            {success ? '¡Listo!' : loading ? 'Un momento…' : 'Entrar al panel'}
          </button>
        </form>

        <p className="text-center font-label-md text-label-md text-on-surface-variant mt-space-md">
          ¿Eres cliente?{' '}
          <Link to="/login" className="text-primary hover:underline">
            Inicia sesión aquí
          </Link>
        </p>
      </div>
    </AuthScene>
  );
}
