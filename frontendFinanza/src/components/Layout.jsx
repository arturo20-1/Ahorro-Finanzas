import { useState } from 'react';
import { Link, NavLink, Outlet, useNavigate } from 'react-router-dom';
import { useAuth } from '../AuthContext';
import { Icon, ThemeToggle } from './ui';

const MENU = [
  { to: '/dashboard', icon: 'grid_view', text: 'Dashboard' },
  { to: '/transacciones', icon: 'receipt_long', text: 'Transacciones & Gastos' },
  { to: '/presupuestos', icon: 'pie_chart', text: 'Presupuestos' },
  { to: '/metas', icon: 'savings', text: 'Metas de Ahorro' },
  { to: '/reportes', icon: 'monitoring', text: 'Reportes & Análisis' },
  { to: '/cuentas', icon: 'account_balance', text: 'Cuentas Bancarias' },
  { to: '/configuracion', icon: 'settings', text: 'Configuración' },
];

// Menú lateral + barra superior; el contenido de cada pantalla entra por <Outlet />
export default function Layout() {
  const { user, logout } = useAuth();
  const navigate = useNavigate();
  const [open, setOpen] = useState(false);

  const handleLogout = async () => {
    await logout();
    navigate('/');
  };

  return (
    <>
      {open && <div className="fixed inset-0 bg-black/50 backdrop-blur-sm z-[45] lg:hidden" onClick={() => setOpen(false)} />}

      <aside
        className={`fixed left-0 top-0 h-full w-72 bg-surface-container-lowest shadow-[0_1px_8px_rgba(0,0,0,0.04)] z-50 flex flex-col justify-between transition-transform duration-300 lg:translate-x-0 ${
          open ? 'translate-x-0' : '-translate-x-full'
        }`}
      >
        <div className="flex flex-col">
          <div className="h-16 px-space-lg flex items-center gap-space-sm">
            <img alt="logo" className="h-10 w-auto object-contain" src="/logo.png" />
            <span className="font-label-sm text-label-sm text-primary tracking-wide uppercase">Finanzas & Ahorro</span>
          </div>
          <nav className="flex flex-col px-space-md mt-space-md gap-space-xs">
            {MENU.map((item) => (
              <NavLink
                key={item.to}
                to={item.to}
                onClick={() => setOpen(false)}
                className={({ isActive }) =>
                  `flex items-center gap-space-sm px-space-md py-space-sm transition-all rounded-xl ${
                    isActive
                      ? 'bg-primary text-on-primary font-label-lg shadow-[0_4px_12px_rgba(0,105,72,0.25)]'
                      : 'text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface'
                  }`
                }
              >
                {({ isActive }) => (
                  <>
                    <Icon name={item.icon} className="text-[20px]" fill={isActive} />
                    <span className="font-label-lg text-label-lg">{item.text}</span>
                  </>
                )}
              </NavLink>
            ))}
          </nav>
        </div>

        <div className="p-space-md">
          <div className="bg-surface-container-low rounded-xl p-space-sm flex items-center gap-space-sm">
            <div className="w-8 h-8 rounded-lg bg-secondary-container flex items-center justify-center">
              <Icon name="verified_user" className="text-on-secondary-container text-[18px]" />
            </div>
            <div className="flex flex-col">
              <span className="font-label-sm text-label-sm text-on-surface">Sesión protegida</span>
              <span className="font-label-sm text-label-sm text-on-surface-variant text-[10px]">Token de acceso (Sanctum)</span>
            </div>
          </div>
        </div>
      </aside>

      <div className="lg:pl-72">
        <header className="fixed top-0 left-0 lg:left-72 right-0 h-16 bg-surface-container-lowest/90 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)] z-40 flex items-center justify-between px-space-lg">
          <div className="flex items-center gap-space-md">
            <button
              type="button"
              aria-label="Abrir menú"
              onClick={() => setOpen(true)}
              className="lg:hidden p-space-xs rounded-xl hover:bg-surface-container-high text-on-surface-variant"
            >
              <Icon name="menu" className="text-[24px]" />
            </button>
            <img alt="logo" className="h-8 w-auto object-contain lg:hidden" src="/logo.png" />
          </div>

          <div className="flex items-center gap-space-md">
            <Link
              to="/transacciones?nueva=1"
              className="flex items-center gap-space-xs bg-primary hover:bg-primary-container text-on-primary px-space-md py-space-xs rounded-xl font-label-lg text-label-lg transition-all shadow-[0_4px_12px_rgba(0,105,72,0.2)]"
            >
              <Icon name="add" className="text-[20px]" />
              <span className="hidden md:inline">Registrar Transacción</span>
            </Link>
            <ThemeToggle />
            <div className="flex items-center gap-space-xs pl-space-xs">
              <div className="w-9 h-9 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center font-label-lg text-label-lg uppercase">
                {user && user.name ? user.name.charAt(0) : '?'}
              </div>
              <span className="hidden md:block font-label-lg text-label-lg text-on-surface max-w-[140px] truncate">{user && user.name}</span>
              <button
                type="button"
                onClick={handleLogout}
                aria-label="Cerrar sesión"
                title="Cerrar sesión"
                className="p-space-xs rounded-xl hover:bg-surface-container-high text-on-surface-variant hover:text-on-surface transition-colors"
              >
                <Icon name="logout" className="text-[22px]" />
              </button>
            </div>
          </div>
        </header>

        <main className="pt-24 pb-space-xl px-space-lg">
          <Outlet />
        </main>
      </div>
    </>
  );
}
