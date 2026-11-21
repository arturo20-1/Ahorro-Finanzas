import { useState } from 'react';
import './Analytics.css';
import { useAuth } from '../AuthContext';
import { useFetch } from '../lib/hooks';
import { Button, Card, Empty, ErrorBox, Icon, Loading, PageHeader } from '../components/ui';
import { money, monthLabel, percent, shortDate, today } from '../lib/format';

const PERIODS = [
  ['month', 'Este mes'],
  ['quarter', 'Último trimestre'],
  ['year', 'Año actual'],
];

export default function Analytics() {
  const { user } = useAuth();
  const [period, setPeriod] = useState('month');
  const { data, error, loading, reload } = useFetch('/analytics', { period });

  const d = data ? data.data : null;
  const periodName = (PERIODS.find(([value]) => value === period) || [null, ''])[1];

  // Abre el diálogo de impresión (ahí se elige "Guardar como PDF").
  // El título de la página se usa como nombre sugerido del archivo.
  const printReport = () => {
    const previous = document.title;
    document.title = `Reporte financiero ${d.from} a ${d.to}`;
    const restore = () => {
      document.title = previous;
      window.removeEventListener('afterprint', restore);
    };
    window.addEventListener('afterprint', restore);
    window.print();
  };
  // Altura máxima de las barras del gráfico mensual
  const maxBar = d ? Math.max(1, ...d.monthly.flatMap((m) => [m.income, m.expenses])) : 1;

  return (
    <div className="flex flex-col w-full pb-space-xl">
      <PageHeader title="Reportes & Análisis" subtitle="Tendencias, desglose de gastos y rendimiento de tu patrimonio.">
        <Button variant="soft" className="no-print" disabled={!d} onClick={printReport}>
          <Icon name="picture_as_pdf" className="text-[20px]" />
          Imprimir / PDF
        </Button>
        <div className="no-print flex items-center bg-surface-container p-1 rounded-xl">
          {PERIODS.map(([value, text]) => (
            <button
              key={value}
              type="button"
              onClick={() => setPeriod(value)}
              className={`px-space-md py-1.5 font-label-md text-label-md rounded-lg transition-all ${
                period === value ? 'bg-surface-container-lowest text-primary shadow-sm font-bold' : 'text-on-surface-variant hover:text-on-surface'
              }`}
            >
              {text}
            </button>
          ))}
        </div>
      </PageHeader>

      {loading && !d && <Loading />}
      {error && <ErrorBox message={error} onRetry={reload} />}

      {d && (
        <>
          {/* Solo se ve al imprimir: datos del reporte */}
          <div className="print-only mb-space-md">
            <p className="font-body-md text-body-md text-on-surface">
              Cliente: <strong>{user && user.name}</strong> · Periodo: <strong>{periodName}</strong> ({shortDate(d.from)} - {shortDate(d.to)})
            </p>
            <p className="font-label-md text-label-md text-on-surface-variant">Generado el {shortDate(today())} · Finanzas & Ahorro</p>
          </div>

          <section className="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-space-md mb-space-lg">
            <Card>
              <p className="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Patrimonio neto</p>
              <p className="font-headline-lg text-headline-lg font-extrabold text-on-surface mt-1">{money(d.net_worth)}</p>
              <p className="font-label-sm text-label-sm text-on-surface-variant mt-1">suma de todas tus cuentas</p>
            </Card>
            <Card>
              <p className="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Tasa de ahorro</p>
              <p className="font-headline-lg text-headline-lg font-extrabold text-primary mt-1">{percent(d.savings_rate)}</p>
              <p className="font-label-sm text-label-sm text-on-surface-variant mt-1">
                ingresos {money(d.income)} · gastos {money(d.expenses)}
              </p>
            </Card>
            <Card>
              <p className="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Mayor gasto</p>
              <p className="font-headline-sm text-headline-sm font-extrabold text-on-surface mt-1 truncate">{d.top_category ? d.top_category.name : 'Sin gastos'}</p>
              <p className="font-label-sm text-label-sm text-on-surface-variant mt-1">
                {d.top_category ? `${money(d.top_category.total)} · ${percent(d.top_category.percentage)} de los gastos` : 'en este periodo'}
              </p>
            </Card>
            <Card>
              <p className="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Flujo neto</p>
              <p className={`font-headline-lg text-headline-lg font-extrabold mt-1 ${d.net >= 0 ? 'text-primary' : 'text-error'}`}>{money(d.net)}</p>
              <p className="font-label-sm text-label-sm text-on-surface-variant mt-1">{d.transactions_count} movimientos</p>
            </Card>
          </section>

          <section className="grid grid-cols-1 xl:grid-cols-2 gap-space-md">
            <Card>
              <h2 className="font-headline-sm text-headline-sm text-on-surface">Ingresos vs. gastos</h2>
              <p className="font-label-md text-label-md text-on-surface-variant mb-space-md">Últimos 6 meses</p>

              <div className="flex items-end gap-space-sm">
                {d.monthly.map((m) => (
                  <div key={m.month} className="flex-1 flex flex-col items-center gap-1">
                    <div className="h-48 w-full flex items-end justify-center gap-1">
                      <div
                        className="w-1/3 max-w-[22px] rounded-t bg-primary"
                        style={{ height: `${(m.income / maxBar) * 100}%` }}
                        title={`Ingresos: ${money(m.income)}`}
                      />
                      <div
                        className="w-1/3 max-w-[22px] rounded-t bg-error"
                        style={{ height: `${(m.expenses / maxBar) * 100}%` }}
                        title={`Gastos: ${money(m.expenses)}`}
                      />
                    </div>
                    <span className="font-label-sm text-label-sm text-on-surface-variant capitalize">{monthLabel(m.month)}</span>
                  </div>
                ))}
              </div>

              <div className="flex gap-space-md mt-space-md font-label-md text-label-md text-on-surface-variant">
                <span className="flex items-center gap-1">
                  <span className="w-3 h-3 rounded-sm bg-primary" /> Ingresos
                </span>
                <span className="flex items-center gap-1">
                  <span className="w-3 h-3 rounded-sm bg-error" /> Gastos
                </span>
              </div>
            </Card>

            <Card>
              <h2 className="font-headline-sm text-headline-sm text-on-surface">Gasto por categoría</h2>
              <p className="font-label-md text-label-md text-on-surface-variant mb-space-md">Total gastado: {money(d.expenses)}</p>

              {d.categories.length === 0 ? (
                <Empty icon="pie_chart" title="Sin gastos en este periodo" />
              ) : (
                <ul className="flex flex-col gap-space-md">
                  {d.categories.map((c) => (
                    <li key={c.id}>
                      <div className="flex items-center justify-between mb-1">
                        <span className="flex items-center gap-space-xs font-label-lg text-label-lg text-on-surface">
                          <Icon name={c.icon || 'sell'} className="text-[18px]" />
                          {c.name}
                        </span>
                        <span className="font-label-md text-label-md text-on-surface-variant">
                          {money(c.total)} · {percent(c.percentage)}
                        </span>
                      </div>
                      <div className="h-2 w-full rounded-full bg-surface-container-high overflow-hidden">
                        <div className="h-full rounded-full" style={{ width: `${c.percentage}%`, backgroundColor: c.color || '#6d7a72' }} />
                      </div>
                    </li>
                  ))}
                </ul>
              )}
            </Card>
          </section>
        </>
      )}
    </div>
  );
}
