import { useRef, useState } from 'react';
import { Link, Navigate, useLocation, useNavigate, useSearchParams } from 'react-router-dom';
import { useAuth } from '../AuthContext';
import { fieldError, isGeneralError } from '../api';
import { Alert, Icon } from '../components/ui';
import AuthScene, { AuthField } from '../components/AuthScene';

// Puntaje de seguridad de la contraseña (0 a 4)
function strength(password) {
  let score = 0;
  if (password.length >= 8) score++;
  if (/[a-z]/.test(password) && /[A-Z]/.test(password)) score++;
  if (/\d/.test(password)) score++;
  if (/[^A-Za-z0-9]/.test(password)) score++;
  return score;
}

const LEVELS = ['Muy débil', 'Débil', 'Regular', 'Buena', 'Fuerte'];

// Pantalla de acceso: iniciar sesión y crear cuenta en la misma página
export default function Login() {
  const { user, login, register } = useAuth();
  const navigate = useNavigate();
  const location = useLocation();
  const [params] = useSearchParams();

  const [mode, setMode] = useState(params.get('registro') ? 'register' : 'login');
  const [form, setForm] = useState({ name: '', email: '', password: '', password_confirmation: '', terms: false });
  const [error, setError] = useState(null);
  const [loading, setLoading] = useState(false);
  const [success, setSuccess] = useState(false);
  const [shake, setShake] = useState(false);
  const [focus, setFocus] = useState(null);
  const [showPass, setShowPass] = useState(false);
  const [caps, setCaps] = useState(false);
  // Mientras se muestra la animación de éxito no se redirige todavía
  const holdRedirect = useRef(false);

  const from = (location.state && location.state.from) || '/dashboard';

  // Si ya hay sesión, no tiene sentido ver el login
  if (user && !holdRedirect.current) return <Navigate to={from} replace />;

  const isRegister = mode === 'register';
  const set = (key) => (e) => setForm((f) => ({ ...f, [key]: e.target.value }));
  const bind = (name) => ({ onFocus: () => setFocus(name), onBlur: () => setFocus(null) });
  const checkCaps = (e) => setCaps(Boolean(e.getModifierState && e.getModifierState('CapsLock')));

  const changeMode = (next) => {
    setMode(next);
    setError(null);
  };

  const submit = async (e) => {
    e.preventDefault();
    setLoading(true);
    setError(null);
    holdRedirect.current = true;
    try {
      if (isRegister) {
        await register({
          name: form.name,
          email: form.email,
          password: form.password,
          password_confirmation: form.password_confirmation,
          terms: form.terms,
        });
      } else {
        await login(form.email, form.password);
      }
      setLoading(false);
      setSuccess(true);
      setTimeout(() => navigate(from, { replace: true }), 900);
    } catch (err) {
      holdRedirect.current = false;
      setError(err);
      setLoading(false);
      setShake(true);
      setTimeout(() => setShake(false), 600);
    }
  };

  // El avatar cambia según lo que haces: escribir el correo, la clave, enviar, error o éxito
  let icon = isRegister ? 'person_add' : 'person';
  if (focus === 'name') icon = 'badge';
  if (focus === 'email') icon = 'mail';
  if (focus === 'password' || focus === 'confirm') icon = showPass ? 'lock_open' : 'lock';
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

  const score = strength(form.password);
  const barColor = score <= 1 ? 'bg-error' : score === 2 ? 'bg-tertiary' : 'bg-primary';
  const confirmFilled = form.password_confirmation.length > 0;
  const confirmOk = confirmFilled && form.password_confirmation === form.password;

  const eye = (
    <button type="button" tabIndex={-1} className="auth-eye" aria-label={showPass ? 'Ocultar contraseña' : 'Mostrar contraseña'} onClick={() => setShowPass((v) => !v)}>
      <Icon name={showPass ? 'visibility_off' : 'visibility'} className="text-[20px]" />
    </button>
  );

  return (
    <AuthScene
      icon={icon}
      spin={loading}
      status={status}
      title="Finanzas & Ahorro"
      subtitle={isRegister ? 'Crea tu cuenta y empieza a ahorrar' : 'Qué bueno verte de nuevo'}
    >
      <div className={shake ? 'auth-shake' : ''}>
        <div className="auth-tabs" role="tablist">
          <button type="button" role="tab" aria-selected={!isRegister} className="auth-tab font-label-lg text-label-lg" onClick={() => changeMode('login')}>
            Iniciar sesión
          </button>
          <button type="button" role="tab" aria-selected={isRegister} className="auth-tab font-label-lg text-label-lg" onClick={() => changeMode('register')}>
            Crear cuenta
          </button>
          <span className="auth-tab-indicator" style={{ transform: `translateX(${isRegister ? 100 : 0}%)` }} />
        </div>

        <form onSubmit={submit} noValidate className="flex flex-col gap-space-lg mt-space-lg">
          {isGeneralError(error) && <Alert>{error.message}</Alert>}

          {isRegister && (
            <div className="auth-appear">
              <AuthField icon="badge" error={fieldError(error, 'name')}>
                <input className="auth-input font-body-md text-body-md" aria-label="Nombre completo" placeholder="Nombre completo" autoComplete="name" value={form.name} onChange={set('name')} {...bind('name')} />
              </AuthField>
            </div>
          )}

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

          <div>
            <AuthField icon="lock" error={fieldError(error, 'password')} right={eye}>
              <input
                className="auth-input font-body-md text-body-md"
                type={showPass ? 'text' : 'password'}
                aria-label="Contraseña"
                placeholder="Contraseña"
                autoComplete={isRegister ? 'new-password' : 'current-password'}
                value={form.password}
                onChange={set('password')}
                onKeyUp={checkCaps}
                {...bind('password')}
              />
            </AuthField>
            {caps && focus === 'password' && (
              <p className="flex items-center gap-1 font-label-sm text-label-sm text-tertiary mt-1">
                <Icon name="keyboard_capslock" className="text-[16px]" /> Mayúsculas activadas
              </p>
            )}
            {isRegister && form.password.length > 0 && (
              <div className="auth-appear mt-space-sm">
                <div className="flex gap-1">
                  {[1, 2, 3, 4].map((n) => (
                    <div key={n} className={`h-1 flex-1 rounded-full transition-colors duration-300 ${n <= score ? barColor : 'bg-on-surface/15'}`} />
                  ))}
                </div>
                <p className="font-label-sm text-label-sm text-on-surface-variant mt-1">Seguridad: {LEVELS[score]}</p>
              </div>
            )}
          </div>

          {isRegister && (
            <>
              <div className="auth-appear">
                <AuthField icon="verified_user">
                  <input
                    className="auth-input font-body-md text-body-md"
                    type={showPass ? 'text' : 'password'}
                    aria-label="Repite la contraseña"
                    placeholder="Repite la contraseña"
                    autoComplete="new-password"
                    value={form.password_confirmation}
                    onChange={set('password_confirmation')}
                    {...bind('confirm')}
                  />
                </AuthField>
                {confirmFilled && (
                  <p className={`flex items-center gap-1 font-label-sm text-label-sm mt-1 ${confirmOk ? 'text-primary' : 'text-on-surface-variant'}`}>
                    <Icon name={confirmOk ? 'check_circle' : 'pending'} className="text-[16px]" />
                    {confirmOk ? 'Las contraseñas coinciden' : 'Todavía no coinciden'}
                  </p>
                )}
              </div>

              <div className="auth-appear">
                <label className="flex items-start gap-space-sm cursor-pointer">
                  <input type="checkbox" className="mt-1 accent-primary" checked={form.terms} onChange={(e) => setForm((f) => ({ ...f, terms: e.target.checked }))} />
                  <span className="font-body-sm text-body-sm text-on-surface-variant">Acepto los términos de servicio</span>
                </label>
                {fieldError(error, 'terms') && <p className="font-label-sm text-label-sm text-error mt-1">{fieldError(error, 'terms')}</p>}
              </div>
            </>
          )}

          <button type="submit" className="auth-button font-label-lg text-label-lg" disabled={loading || success}>
            {success ? '¡Listo!' : loading ? 'Un momento…' : isRegister ? 'Crear mi cuenta' : 'Entrar'}
          </button>
        </form>

        <p className="text-center font-label-md text-label-md text-on-surface-variant mt-space-md">
          ¿Eres administrador?{' '}
          <Link to="/admin/login" className="text-primary hover:underline">
            Entra aquí
          </Link>
        </p>
      </div>
    </AuthScene>
  );
}
