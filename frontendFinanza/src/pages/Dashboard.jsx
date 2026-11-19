import { Link } from 'react-router-dom';
import { useAuth } from '../AuthContext';
import { useFetch } from '../lib/hooks';
import { Card, Empty, ErrorBox, Icon, Loading, PageHeader } from '../components/ui';
import TxItem from '../components/TxItem';
import { changeText, money, percent } from '../lib/format';

// Tarjeta de indicador (KPI)
function Kpi({ title, icon, iconClass, value, valueClass = 'text-on-surface', children }) {
  return (
    <Card className="flex flex-col justify-between">
      <div className="flex items-center justify-between mb-space-sm">
        <span className="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">{title}</span>
        <div className={`w-9 h-9 rounded-xl flex items-center justify-center ${iconClass}`}>
          <Icon name={icon} className="text-[20px]" />
        </div>
      </div>
      <div className={`font-headline-lg text-headline-lg font-extrabold tracking-tight ${valueClass}`}>{value}</div>
      <div className="mt-space-xs font-label-sm text-label-sm text-on-surface-variant">{children}</div>
    </Card>
  );
}

export default function Dashboard() {
  const { user } = useAuth();
  const { data, error, loading, reload } = useFetch('/dashboard');

  if (loading) return <Loading />;
  if (error) return <ErrorBox message={error} onRetry={reload} />;

  const d = data.data;
  const firstName = user && user.name ? user.name.split(' ')[0] : '';
  const positive = d.net >= 0;

  return (
    <div className="flex flex-col w-full pb-space-xl">
      <PageHeader title={`¡Hola, ${firstName}!`} subtitle="Aquí está el balance y rendimiento financiero de tu patrimonio en tiempo real.">
        <Link
          to="/metas"
          className="flex items-center gap-space-xs bg-surface-container-low hover:bg-surface-container text-on-surface px-space-md py-2 rounded-xl font-label-lg text-label-lg"
        >
          <Icon name="flag" className="text-[18px] text-tertiary" />
          Metas
        </Link>
        <Link
          to="/transacciones?nueva=1"
          className="flex items-center gap-space-xs bg-primary hover:bg-primary-container text-on-primary px-space-md py-2 rounded-xl font-label-lg text-label-lg"
        >
          <Icon name="add_circle" className="text-[20px]" />
          Registrar transacción
        </Link>
      </PageHeader>

      <section className="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-space-md mb-space-lg">
        <Kpi title="Balance total" icon="account_balance_wallet" iconClass="bg-secondary-container text-on-secondary-container" value={money(d.balance)}>
          {d.accounts_count} {d.accounts_count === 1 ? 'cuenta registrada' : 'cuentas registradas'}
        </Kpi>
        <Kpi title="Ingresos del mes" icon="arrow_downward" iconClass="bg-primary-fixed text-on-primary-fixed" value={money(d.income)} valueClass="text-primary">
          {changeText(d.income_change)} vs. mes anterior · {d.income_count} mov.
        </Kpi>
        <Kpi title="Gastos del mes" icon="arrow_upward" iconClass="bg-error-container text-on-error-container" value={money(d.expenses)} valueClass="text-error">
          {changeText(d.expense_change)} vs. mes anterior · {d.expense_count} mov.
        </Kpi>
        <Kpi title="Tasa de ahorro" icon={positive ? 'trending_up' : 'trending_down'} iconClass="bg-tertiary-fixed text-on-tertiary-fixed" value={percent(d.savings_rate)}>
          {d.health} · neto {money(d.net)}
        </Kpi>
      </section>

      <Card>
        <div className="flex items-center justify-between mb-space-sm">
          <h2 className="font-headline-sm text-headline-sm text-on-surface">Transacciones recientes</h2>
          <Link to="/transacciones" className="font-label-lg text-label-lg text-primary hover:underline">
            Ver todas
          </Link>
        </div>
        {d.recent.length === 0 ? (
          <Empty icon="receipt_long" title="Aún no hay transacciones">
            Registra la primera con el botón &quot;Registrar transacción&quot;.
          </Empty>
        ) : (
          <ul className="divide-y divide-outline-variant/30">
            {d.recent.map((tx) => (
              <TxItem key={tx.id} tx={tx} />
            ))}
          </ul>
        )}
        <p className="mt-space-sm font-label-sm text-label-sm text-on-surface-variant">{d.month_transactions} movimientos este mes</p>
      </Card>
    </div>
  );
}
