import { useRef } from 'react';
import './AuthScene.css';
import { BackButton, Icon, ThemeToggle } from './ui';

// Paneles de cristal que rodean al avatar.
// d = cuánto se mueven con el mouse (profundidad), ry/rz/sk = giro e inclinación en grados
const PANELS = [
  { left: '15%', top: '6%', width: '19%', height: '15%', d: -10, ry: 58, rz: -5, sk: -12 },
  { left: '5%', top: '30%', width: '21%', height: '23%', d: -18, ry: 52, rz: -9, sk: -10 },
  { left: '0%', top: '58%', width: '29%', height: '30%', d: -26, ry: 46, rz: -7, sk: -8 },
  { right: '15%', top: '6%', width: '19%', height: '15%', d: 10, ry: -58, rz: 5, sk: 12 },
  { right: '5%', top: '30%', width: '21%', height: '23%', d: 18, ry: -52, rz: 9, sk: 10 },
  { right: '0%', top: '58%', width: '29%', height: '30%', d: 26, ry: -46, rz: 7, sk: 8 },
];

// Escena del login: avatar de cristal sobre una plataforma luminosa.
// Reacciona al mouse (parallax) y a "status": idle | busy | error | success
export default function AuthScene({ icon = 'person', spin = false, status = 'idle', title, subtitle, children }) {
  const ref = useRef(null);

  // Se escriben las variables CSS directamente (sin re-renderizar React en cada movimiento)
  const setVars = (x, y) => {
    if (!ref.current) return;
    ref.current.style.setProperty('--mx', x);
    ref.current.style.setProperty('--my', y);
  };
  const move = (e) => setVars(((e.clientX / window.innerWidth) * 2 - 1).toFixed(3), ((e.clientY / window.innerHeight) * 2 - 1).toFixed(3));
  const reset = () => setVars('0', '0');

  return (
    <div
      ref={ref}
      onMouseMove={move}
      onMouseLeave={reset}
      className={`auth-page auth-${status} min-h-screen flex flex-col items-center justify-center px-space-md py-space-lg overflow-x-hidden`}
    >
      <div className="fixed top-3 left-3 z-20">
        <BackButton />
      </div>
      <div className="fixed top-3 right-3 z-20">
        <ThemeToggle />
      </div>

      <div className="text-center mb-space-sm">
        <div className="flex items-center justify-center gap-space-sm">
          <img alt="logo" className="h-10 w-auto object-contain" src="/logo.png" />
          <h1 className="font-label-lg text-label-lg uppercase tracking-widest text-primary">{title}</h1>
        </div>
        <div className="auth-line" />
        {subtitle && <p className="font-body-sm text-body-sm text-on-surface-variant mt-space-sm">{subtitle}</p>}
      </div>

      <div className="auth-stage" aria-hidden="true">
        {PANELS.map((p, i) => (
          <div
            key={i}
            className="auth-panel"
            style={{
              left: p.left,
              right: p.right,
              top: p.top,
              width: p.width,
              height: p.height,
              '--d': p.d,
              '--ry': `${p.ry}deg`,
              '--rz': `${p.rz}deg`,
              '--sk': `${p.sk}deg`,
            }}
          />
        ))}
        <div className="auth-platform" />
        <div className="auth-avatar-float">
          <div className="auth-avatar">
            <Icon key={icon} name={icon} fill className={`auth-icon text-[60px] ${spin ? 'animate-spin' : ''}`} />
          </div>
        </div>
      </div>

      <div className="w-full max-w-sm relative z-10">{children}</div>
    </div>
  );
}

// Campo con icono a la izquierda y subrayado luminoso; "right" es para botones (ojo de contraseña)
export function AuthField({ icon, error, right, children }) {
  return (
    <div>
      <div className="auth-field">
        <Icon name={icon} className="auth-field-icon text-[20px]" />
        {children}
        {right}
      </div>
      {error && <p className="font-label-sm text-label-sm text-error mt-1">{error}</p>}
    </div>
  );
}
