import { useEffect } from 'react';
import { useNavigate } from 'react-router-dom';

// Icono de Material Symbols (la fuente de iconos del diseño)
export function Icon({ name, className = '', fill = false }) {
  return (
    <span className={`material-symbols-outlined ${className}`} style={fill ? { fontVariationSettings: "'FILL' 1" } : undefined}>
      {name}
    </span>
  );
}

export function Card({ className = '', children }) {
  return <div className={`bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm ${className}`}>{children}</div>;
}

export function PageHeader({ title, subtitle, children }) {
  return (
    <header className="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-space-md mb-space-lg">
      <div>
        <h1 className="font-headline-lg text-headline-lg text-on-surface tracking-tight">{title}</h1>
        {subtitle && <p className="font-body-md text-body-md text-on-surface-variant mt-1">{subtitle}</p>}
      </div>
      {children && <div className="flex flex-wrap items-center gap-space-sm">{children}</div>}
    </header>
  );
}

const VARIANTS = {
  primary: 'bg-primary hover:bg-primary-container text-on-primary shadow-[0_4px_12px_rgba(0,105,72,0.2)]',
  soft: 'bg-surface-container-low hover:bg-surface-container text-on-surface',
  danger: 'bg-error-container text-on-error-container hover:opacity-90',
  ghost: 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface',
};

export function Button({ variant = 'primary', loading = false, loadingText = 'Guardando…', className = '', children, ...props }) {
  return (
    <button
      type="button"
      {...props}
      disabled={loading || props.disabled}
      className={`inline-flex items-center justify-center gap-space-xs px-space-md py-2 rounded-xl font-label-lg text-label-lg transition-all disabled:opacity-60 disabled:cursor-not-allowed ${VARIANTS[variant]} ${className}`}
    >
      {loading ? loadingText : children}
    </button>
  );
}

// Clases de los campos de texto, números, fechas y selects
export const inputClass =
  'w-full bg-surface-container-low rounded-xl px-space-md py-space-sm font-body-md text-body-md text-on-surface placeholder:text-on-surface-variant border border-outline-variant/40 outline-none focus:ring-2 focus:ring-primary/40';

// Etiqueta + control + mensaje de error del campo
export function Field({ label, error, hint, children }) {
  return (
    <label className="flex flex-col gap-1">
      <span className="font-label-md text-label-md text-on-surface-variant">{label}</span>
      {children}
      {hint && !error && <span className="font-label-sm text-label-sm text-on-surface-variant">{hint}</span>}
      {error && <span className="font-label-sm text-label-sm text-error">{error}</span>}
    </label>
  );
}

export function Alert({ type = 'error', children }) {
  const styles = type === 'error' ? 'bg-error-container text-on-error-container' : 'bg-primary-fixed text-on-primary-fixed';
  return <div className={`rounded-xl px-space-md py-space-sm font-body-sm text-body-sm ${styles}`}>{children}</div>;
}

export function Modal({ title, onClose, children }) {
  useEffect(() => {
    const onKey = (e) => {
      if (e.key === 'Escape') onClose();
    };
    window.addEventListener('keydown', onKey);
    return () => window.removeEventListener('keydown', onKey);
  }, [onClose]);

  return (
    <div className="fixed inset-0 z-[60] flex items-center justify-center p-space-md">
      <div className="absolute inset-0 bg-black/50 backdrop-blur-sm" onClick={onClose} />
      <div className="relative w-full max-w-lg max-h-[90vh] overflow-y-auto bg-surface-container-lowest rounded-2xl p-space-lg shadow-xl">
        <div className="flex items-center justify-between mb-space-md">
          <h2 className="font-headline-sm text-headline-sm text-on-surface">{title}</h2>
          <button type="button" onClick={onClose} aria-label="Cerrar" className="p-1 rounded-lg hover:bg-surface-container-high text-on-surface-variant">
            <Icon name="close" />
          </button>
        </div>
        {children}
      </div>
    </div>
  );
}

export function Loading() {
  return (
    <div className="flex items-center justify-center py-space-xl gap-space-sm text-on-surface-variant">
      <Icon name="progress_activity" className="animate-spin" />
      <span className="font-body-md text-body-md">Cargando…</span>
    </div>
  );
}

export function ErrorBox({ message, onRetry }) {
  return (
    <div className="flex flex-col items-center gap-space-sm py-space-xl text-center">
      <Icon name="cloud_off" className="text-[40px] text-error" />
      <p className="font-body-md text-body-md text-on-surface">{message}</p>
      {onRetry && (
        <Button variant="soft" onClick={onRetry}>
          Reintentar
        </Button>
      )}
    </div>
  );
}

export function Empty({ icon = 'inbox', title, children }) {
  return (
    <div className="flex flex-col items-center gap-space-xs py-space-xl text-center text-on-surface-variant">
      <Icon name={icon} className="text-[40px]" />
      <p className="font-label-lg text-label-lg text-on-surface">{title}</p>
      {children && <div className="font-body-sm text-body-sm">{children}</div>}
    </div>
  );
}

// Barra de progreso: tone = ok | warning | exceeded
export function ProgressBar({ percent, tone = 'ok' }) {
  const colors = { ok: 'bg-primary', warning: 'bg-tertiary', exceeded: 'bg-error' };
  const width = Math.max(0, Math.min(100, Number(percent) || 0));
  return (
    <div className="h-2 w-full rounded-full bg-surface-container-high overflow-hidden">
      <div className={`h-full rounded-full ${colors[tone]}`} style={{ width: `${width}%` }} />
    </div>
  );
}

// Botón "Volver": regresa a la página anterior; si no hay (se abrió directo), va a la ruta de respaldo
export function BackButton({ fallback = '/', className = '' }) {
  const navigate = useNavigate();

  const goBack = () => {
    if (window.history.state && window.history.state.idx > 0) navigate(-1);
    else navigate(fallback);
  };

  return (
    <button
      type="button"
      onClick={goBack}
      className={`inline-flex items-center gap-space-xs px-space-sm py-space-xs rounded-xl font-label-lg text-label-lg text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface transition-colors ${className}`}
    >
      <Icon name="arrow_back" className="text-[20px]" />
      <span>Volver</span>
    </button>
  );
}

// Cambia entre modo claro y oscuro y recuerda la elección
export function toggleTheme() {
  const dark = document.documentElement.classList.toggle('dark');
  try {
    localStorage.setItem('theme', dark ? 'dark' : 'light');
  } catch (e) {
    // el navegador no permite guardar la preferencia: no pasa nada
  }
}

export function ThemeToggle({ className = '' }) {
  return (
    <button
      type="button"
      id="theme-toggle"
      onClick={toggleTheme}
      aria-label="Cambiar entre modo claro y oscuro"
      title="Modo claro / oscuro"
      className={`p-space-xs rounded-xl hover:bg-surface-container-high text-on-surface-variant hover:text-on-surface transition-colors ${className}`}
    >
      <Icon name="dark_mode" className="text-[22px] dark:hidden" />
      <Icon name="light_mode" className="text-[22px] hidden dark:inline" />
    </button>
  );
}
