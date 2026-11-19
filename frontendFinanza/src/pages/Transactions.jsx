import { useEffect, useState } from 'react';
import { Link, useSearchParams } from 'react-router-dom';
import { api, fieldError, isGeneralError } from '../api';
import { useFetch } from '../lib/hooks';
import { Alert, Button, Card, Empty, ErrorBox, Field, Icon, Loading, Modal, PageHeader, inputClass } from '../components/ui';
import TxItem from '../components/TxItem';
import { money, percent, today } from '../lib/format';

const PERIODS = [
  ['month', 'Este mes'],
  ['30days', 'Últimos 30 días'],
  ['year', 'Este año'],
  ['all', 'Todo'],
];

// Formulario para registrar un ingreso o un gasto
function TxForm({ accounts, categories, onClose, onSaved }) {
  const [form, setForm] = useState({
    type: 'expense',
    amount: '',
    description: '',
    category_id: '',
    account_id: accounts[0] ? accounts[0].id : '',
    transaction_date: today(),
  });
  const [error, setError] = useState(null);
  const [saving, setSaving] = useState(false);

  const set = (key) => (e) => setForm((f) => ({ ...f, [key]: e.target.value }));
  const setType = (type) => setForm((f) => ({ ...f, type, category_id: '' }));
  const options = categories.filter((c) => c.type === form.type);

  const submit = async (e) => {
    e.preventDefault();
    setSaving(true);
    setError(null);
    try {
      await api('/transactions', { method: 'POST', body: form });
      onSaved();
    } catch (err) {
      setError(err);
      setSaving(false);
    }
  };

  if (accounts.length === 0) {
    return (
      <Empty icon="account_balance" title="Primero crea una cuenta">
        <Link to="/cuentas" className="text-primary hover:underline">
          Ir a Cuentas
        </Link>
      </Empty>
    );
  }

  return (
    <form onSubmit={submit} className="flex flex-col gap-space-md">
      {isGeneralError(error) && <Alert>{error.message}</Alert>}

      <div className="flex bg-surface-container p-1 rounded-xl">
        {[
          ['expense', 'Gasto'],
          ['income', 'Ingreso'],
        ].map(([value, text]) => (
          <button
            key={value}
            type="button"
            onClick={() => setType(value)}
            className={`flex-1 py-2 rounded-lg font-label-lg text-label-lg transition-all ${
              form.type === value ? 'bg-surface-container-lowest text-primary shadow-sm' : 'text-on-surface-variant'
            }`}
          >
            {text}
          </button>
        ))}
      </div>

      <div className="grid grid-cols-2 gap-space-md">
        <Field label="Importe" error={fieldError(error, 'amount')}>
          <input className={inputClass} type="number" step="0.01" min="0" value={form.amount} onChange={set('amount')} placeholder="0.00" />
        </Field>
        <Field label="Fecha" error={fieldError(error, 'transaction_date')}>
          <input className={inputClass} type="date" max={today()} value={form.transaction_date} onChange={set('transaction_date')} />
        </Field>
      </div>

      <Field label="Concepto o establecimiento" error={fieldError(error, 'description')}>
        <input className={inputClass} value={form.description} onChange={set('description')} placeholder="Ej: Supermercado" />
      </Field>

      <div className="grid grid-cols-2 gap-space-md">
        <Field label="Categoría" error={fieldError(error, 'category_id')}>
          <select className={inputClass} value={form.category_id} onChange={set('category_id')}>
            <option value="">Elige…</option>
            {options.map((c) => (
              <option key={c.id} value={c.id}>
                {c.name}
              </option>
            ))}
          </select>
        </Field>
        <Field label="Cuenta" error={fieldError(error, 'account_id')}>
          <select className={inputClass} value={form.account_id} onChange={set('account_id')}>
            {accounts.map((a) => (
              <option key={a.id} value={a.id}>
                {a.name}
              </option>
            ))}
          </select>
        </Field>
      </div>

      <div className="flex justify-end gap-space-sm">
        <Button variant="ghost" onClick={onClose}>
          Cancelar
        </Button>
        <Button type="submit" loading={saving}>
          Guardar transacción
        </Button>
      </div>
    </form>
  );
}

export default function Transactions() {
  const [searchParams, setSearchParams] = useSearchParams();
  const [qInput, setQInput] = useState('');
  const [filters, setFilters] = useState({ q: '', type: '', period: 'month', account_id: '', category_id: '' });
  const [page, setPage] = useState(1);
  const [showForm, setShowForm] = useState(false);

  const list = useFetch('/transactions', { ...filters, page });
  const accounts = useFetch('/accounts');
  const categories = useFetch('/categories');

  // El botón "Registrar transacción" del menú abre el formulario con ?nueva=1
  useEffect(() => {
    if (searchParams.get('nueva') === '1') {
      setShowForm(true);
      setSearchParams({}, { replace: true });
    }
  }, [searchParams]);

  // La búsqueda por texto espera un momento después de dejar de escribir
  useEffect(() => {
    const timer = setTimeout(() => {
      setFilters((f) => (f.q === qInput ? f : { ...f, q: qInput }));
      setPage(1);
    }, 350);
    return () => clearTimeout(timer);
  }, [qInput]);

  const setFilter = (key, value) => {
    setFilters((f) => ({ ...f, [key]: value }));
    setPage(1);
  };

  const saved = () => {
    setShowForm(false);
    list.reload();
    accounts.reload();
  };

  const s = list.data ? list.data.summary : null;
  const meta = list.data ? list.data.meta : null;
  const rows = list.data ? list.data.data : [];
  const ready = accounts.data && categories.data;

  return (
    <div className="flex flex-col w-full pb-space-xl">
      <PageHeader title="Transacciones & Gastos" subtitle="Consulta, filtra y registra tus ingresos y gastos.">
        <Button onClick={() => setShowForm(true)}>
          <Icon name="add_circle" className="text-[20px]" />
          Registrar transacción
        </Button>
      </PageHeader>

      {s && (
        <section className="grid grid-cols-2 xl:grid-cols-4 gap-space-md mb-space-lg">
          <Card>
            <p className="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Ingresos</p>
            <p className="font-headline-md text-headline-md font-extrabold text-primary">{money(s.income)}</p>
            <p className="font-label-sm text-label-sm text-on-surface-variant">{s.income_count} movimientos</p>
          </Card>
          <Card>
            <p className="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Gastos</p>
            <p className="font-headline-md text-headline-md font-extrabold text-error">{money(s.expenses)}</p>
            <p className="font-label-sm text-label-sm text-on-surface-variant">{s.expense_count} movimientos</p>
          </Card>
          <Card>
            <p className="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Neto</p>
            <p className={`font-headline-md text-headline-md font-extrabold ${s.net >= 0 ? 'text-primary' : 'text-error'}`}>{money(s.net)}</p>
          </Card>
          <Card>
            <p className="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Tasa de ahorro</p>
            <p className="font-headline-md text-headline-md font-extrabold text-on-surface">{percent(s.savings_rate)}</p>
          </Card>
        </section>
      )}

      <Card className="mb-space-md">
        <div className="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-space-sm">
          <input className={inputClass} placeholder="Buscar por concepto…" value={qInput} onChange={(e) => setQInput(e.target.value)} />
          <select className={inputClass} value={filters.type} onChange={(e) => setFilter('type', e.target.value)}>
            <option value="">Ingresos y gastos</option>
            <option value="income">Solo ingresos</option>
            <option value="expense">Solo gastos</option>
          </select>
          <select className={inputClass} value={filters.period} onChange={(e) => setFilter('period', e.target.value)}>
            {PERIODS.map(([value, text]) => (
              <option key={value} value={value}>
                {text}
              </option>
            ))}
          </select>
          <select className={inputClass} value={filters.account_id} onChange={(e) => setFilter('account_id', e.target.value)}>
            <option value="">Todas las cuentas</option>
            {accounts.data && accounts.data.data.map((a) => (
              <option key={a.id} value={a.id}>
                {a.name}
              </option>
            ))}
          </select>
          <select className={inputClass} value={filters.category_id} onChange={(e) => setFilter('category_id', e.target.value)}>
            <option value="">Todas las categorías</option>
            {categories.data && categories.data.data.map((c) => (
              <option key={c.id} value={c.id}>
                {c.name}
              </option>
            ))}
          </select>
        </div>
      </Card>

      <Card>
        {list.loading && !list.data ? (
          <Loading />
        ) : list.error ? (
          <ErrorBox message={list.error} onRetry={list.reload} />
        ) : rows.length === 0 ? (
          <Empty icon="receipt_long" title="No hay transacciones con estos filtros">
            Prueba con otro periodo o registra una nueva.
          </Empty>
        ) : (
          <>
            <ul className="divide-y divide-outline-variant/30">
              {rows.map((tx) => (
                <TxItem key={tx.id} tx={tx} />
              ))}
            </ul>
            <div className="flex items-center justify-between mt-space-md">
              <span className="font-label-md text-label-md text-on-surface-variant">
                Página {meta.current_page} de {meta.last_page} · {meta.total} transacciones
              </span>
              <div className="flex gap-space-xs">
                <Button variant="soft" disabled={meta.current_page <= 1} onClick={() => setPage(meta.current_page - 1)}>
                  Anterior
                </Button>
                <Button variant="soft" disabled={meta.current_page >= meta.last_page} onClick={() => setPage(meta.current_page + 1)}>
                  Siguiente
                </Button>
              </div>
            </div>
          </>
        )}
      </Card>

      {showForm && (
        <Modal title="Registrar transacción" onClose={() => setShowForm(false)}>
          {ready ? (
            <TxForm accounts={accounts.data.data} categories={categories.data.data} onClose={() => setShowForm(false)} onSaved={saved} />
          ) : (
            <Loading />
          )}
        </Modal>
      )}
    </div>
  );
}
