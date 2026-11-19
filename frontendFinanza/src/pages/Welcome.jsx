import { Link } from 'react-router-dom';
import { useAuth } from '../AuthContext';
import { Icon, ThemeToggle } from '../components/ui';

const FEATURES = [
  { icon: 'account_balance', title: 'Todas tus cuentas', text: 'Cuentas bancarias, tarjetas y efectivo con su saldo siempre al día.' },
  { icon: 'receipt_long', title: 'Ingresos y gastos', text: 'Registra cada movimiento y filtra por fecha, cuenta o categoría.' },
  { icon: 'pie_chart', title: 'Presupuestos y metas', text: 'Pon límites por categoría y avanza hacia tus metas de ahorro.' },
];

export default function Welcome() {
  const { user } = useAuth();

  return (
    <div className="min-h-screen flex flex-col">
      <header className="flex items-center justify-between px-space-lg h-16">
        <div className="flex items-center gap-space-sm">
          <img alt="logo" className="h-10 w-auto object-contain" src="/logo.png" />
          <span className="font-label-sm text-label-sm text-primary tracking-wide uppercase">Finanzas & Ahorro</span>
        </div>
        <ThemeToggle />
      </header>

      <main className="flex-1 flex flex-col items-center justify-center text-center px-space-lg py-space-xl gap-space-lg">
        <h1 className="font-display-mobile text-display-mobile md:font-display md:text-display text-on-surface max-w-3xl">
          Controla tu dinero y haz crecer tus ahorros
        </h1>
        <p className="font-body-lg text-body-lg text-on-surface-variant max-w-xl">
          Una app para registrar tus ingresos y gastos, fijar presupuestos y alcanzar tus metas financieras.
        </p>
        <div className="flex flex-wrap items-center justify-center gap-space-sm">
          {user ? (
            <Link to="/dashboard" className="bg-primary hover:bg-primary-container text-on-primary px-space-lg py-space-sm rounded-xl font-label-lg text-label-lg">
              Ir al dashboard
            </Link>
          ) : (
            <>
              <Link to="/login" className="bg-primary hover:bg-primary-container text-on-primary px-space-lg py-space-sm rounded-xl font-label-lg text-label-lg">
                Iniciar sesión
              </Link>
              <Link
                to="/login?registro=1"
                className="bg-surface-container-low hover:bg-surface-container text-on-surface px-space-lg py-space-sm rounded-xl font-label-lg text-label-lg"
              >
                Crear cuenta
              </Link>
            </>
          )}
        </div>

        <div className="grid grid-cols-1 md:grid-cols-3 gap-space-md max-w-4xl w-full mt-space-lg">
          {FEATURES.map((f) => (
            <div key={f.title} className="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm text-left">
              <div className="w-10 h-10 rounded-xl bg-secondary-container text-on-secondary-container flex items-center justify-center mb-space-sm">
                <Icon name={f.icon} className="text-[22px]" />
              </div>
              <h3 className="font-headline-sm text-headline-sm text-on-surface">{f.title}</h3>
              <p className="font-body-sm text-body-sm text-on-surface-variant mt-1">{f.text}</p>
            </div>
          ))}
        </div>
      </main>

      <footer className="text-center py-space-md font-label-md text-label-md text-on-surface-variant">
        <Link to="/admin/login" className="hover:text-on-surface">
          Acceso administrador
        </Link>
      </footer>
    </div>
  );
}
