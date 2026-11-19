import { useState } from 'react';
import { api, fieldError, isGeneralError } from '../api';
import { useFetch } from '../lib/hooks';
import { Alert, Button, Card, Empty, ErrorBox, Field, Icon, Loading, Modal, PageHeader, ProgressBar, inputClass } from '../components/ui';
import { monthEnd, monthStart, money, percent, shortDate } from '../lib/format';

const STATUS = {
  ok: { text: 'Saludable', chip: 'bg-primary-fixed text-on-primary-fixed' },
  warning: { text: 'En precaución', chip: 'bg-tertiary-fixed text-on-tertiary-fixed' },
  exceeded: { text: 'Excedido', chip: 'bg-error-container text-on-error-container' },
};

// Formulario para crear o editar un presupuesto
function BudgetForm({ budget, categories, onClose, onSaved }) {
  const [form, setForm] = useState({
    category_id: budget ? budget.category.id : '',
    amount_limit: budget ? budget.amount_limit : '',
    start_date: budget ? budget.start_date : monthStart(),
    end_date: budget ? budget.end_date : monthEnd(),
  });
  const [error, setError] = useState(null);
  const [saving, setSaving] = useState(false);

  const set = (key) => (e) => setForm((f) => ({ ...f, [key]: e.target.value }));

  const submit = async (e) => {
    e.preventDefault();
    setSaving(true);
    setError(null);
    try {
      await api(budget ? `/budgets/${budget.id}` : '/budgets', { method: budget ? 'PUT' : 'POST', body: form });
      onSaved();
    } catch (err) {
      setError(err);
      setSaving(false);
    }
  };

  return (
    <form onSubmit={submit} className="flex flex-col gap-space-md">
      {isGeneralError(error) && <Alert>{error.message}</Alert>}

      <Field label="Categoría de gasto" error={fieldError(error, 'category_id')}>
        <select className={inputClass} value={form.category_id} onChange={set('category_id')}>
          <option value="">Elige…</option>
          {categories.map((c) => (
            <option key={c.id} value={c.id}>
              {c.name}
            </option>
          ))}
        </select>
      </Field>

      <Field label="Límite" error={fieldError(error, 'amount_limit')}>
        <input className={inputClass} type="number" step="0.01" min="0" value={form.amount_limit} onChange={set('amount_limit')} placeholder="0.00" />
      </Field>

      <div className="grid grid-cols-2 gap-space-md">
        <Field label="Desde" error={fieldError(error, 'start_date')}>
          <input className={inputClass} type="date" value={form.start_date} onChange={set('start_date')} />
        </Field>
        <Field label="Hasta" error={fieldError(error, 'end_date')}>
          <input className={inputClass} type="date" value={form.end_date} onChange={set('end_date')} />
        </Field>
      </div>

      <div className="flex justify-end gap-space-sm">
        <Button variant="ghost" onClick={onClose}>
          Cancelar
        </Button>
        <Button type="submit" loading={saving}>
          {budget ? 'Guardar cambios' : 'Crear presupuesto'}
        </Button>
      </div>
    </form>
  );
}

export default function Budgets() {
  const budgets = useFetch('/budgets');
  const categories = useFetch('/categories');
  const [editing, setEditing] = useState(null); // null = cerrado, 'new' = crear, objeto = editar
  const [filter, setFilter] = useState('all');
  const [actionError, setActionError] = useState(null);

  if (budgets.loading || categories.loading) return <Loading />;
  if (budgets.error || categories.error) {
    return (
      <ErrorBox
        message={budgets.error || categories.error}
        onRetry={() => {
          budgets.reload();
          categories.reload();
        }}
      />
    );
  }

  const all = budgets.data.data;
  const expenseCategories = categories.data.data.filter((c) => c.type === 'expense');
  const shown = filter === 'all' ? all : all.filter((b) => b.status === filter);

  const totalLimit = all.reduce((sum, b) => sum + b.amount_limit, 0);
  const totalSpent = all.reduce((sum, b) => sum + b.spent, 0);
  const totalPercent = totalLimit > 0 ? (totalSpent / totalLimit) * 100 : 0;
  const count = (status) => all.filter((b) => b.status === status).length;

  const remove = async (budget) => {
    if (!window.confirm(`¿Eliminar el presupuesto de ${budget.category.name}?`)) return;
    setActionError(null);
    try {
      await api(`/budgets/${budget.id}`, { method: 'DELETE' });
      await budgets.reload();
    } catch (err) {
      setActionError(err.message);
    }
  };

  const saved = () => {
    setEditing(null);
    budgets.reload();
  };

  const tabs = [
    ['all', `Todos (${all.length})`],
    ['ok', `Saludables (${count('ok')})`],
    ['warning', `En precaución (${count('warning')})`],
    ['exceeded', `Excedidos (${count('exceeded')})`],
  ];

  return (
    <div className="flex flex-col w-full pb-space-xl">
      <PageHeader title="Presupuestos" subtitle="Asigna límites de gasto por categoría y controla cuánto llevas consumido.">
        <Button onClick={() => setEditing('new')}>
          <Icon name="add_circle" className="text-[20px]" />
          Crear presupuesto
        </Button>
      </PageHeader>

      {actionError && (
        <div className="mb-space-md">
          <Alert>{actionError}</Alert>
        </div>
      )}

      <section className="grid grid-cols-1 sm:grid-cols-3 gap-space-md mb-space-lg">
        <Card>
          <p className="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Presupuesto total</p>
          <p className="font-headline-lg text-headline-lg font-extrabold text-on-surface mt-1">{money(totalLimit)}</p>
          <p className="font-label-sm text-label-sm text-on-surface-variant mt-1">{all.length} presupuestos</p>
        </Card>
        <Card>
          <p className="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Consumido</p>
          <p className="font-headline-lg text-headline-lg font-extrabold text-on-surface mt-1">{money(totalSpent)}</p>
          <p className="font-label-sm text-label-sm text-on-surface-variant mt-1">{percent(totalPercent)} del total</p>
        </Card>
        <Card>
          <p className="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Disponible</p>
          <p className={`font-headline-lg text-headline-lg font-extrabold mt-1 ${totalLimit - totalSpent >= 0 ? 'text-primary' : 'text-error'}`}>
            {money(totalLimit - totalSpent)}
          </p>
          <p className="font-label-sm text-label-sm text-on-surface-variant mt-1">límite menos gastado</p>
        </Card>
      </section>

      <div className="flex flex-wrap gap-space-xs mb-space-md">
        {tabs.map(([value, text]) => (
          <button
            key={value}
            type="button"
            onClick={() => setFilter(value)}
            className={`px-space-md py-1.5 rounded-xl font-label-md text-label-md transition-all ${
              filter === value ? 'bg-primary text-on-primary' : 'bg-surface-container-low text-on-surface-variant hover:text-on-surface'
            }`}
          >
            {text}
          </button>
        ))}
      </div>

      {shown.length === 0 ? (
        <Card>
          <Empty icon="pie_chart" title="No hay presupuestos para mostrar">
            Crea uno para controlar el gasto de una categoría.
          </Empty>
        </Card>
      ) : (
        <section className="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-space-md">
          {shown.map((b) => {
            const color = b.category.color || '#6d7a72';
            const status = STATUS[b.status];
            return (
              <Card key={b.id} className="flex flex-col gap-space-sm">
                <div className="flex items-center justify-between">
                  <div className="flex items-center gap-space-sm min-w-0">
                    <div className="w-10 h-10 rounded-xl flex items-center justify-center shrink-0" style={{ backgroundColor: `${color}22`, color }}>
                      <Icon name={b.category.icon || 'sell'} className="text-[22px]" />
                    </div>
                    <div className="min-w-0">
                      <p className="font-label-lg text-label-lg text-on-surface truncate">{b.category.name}</p>
                      <p className="font-label-sm text-label-sm text-on-surface-variant">
                        {shortDate(b.start_date)} - {shortDate(b.end_date)}
                      </p>
                    </div>
                  </div>
                  <span className={`px-2 py-0.5 rounded-full font-label-sm text-label-sm font-bold whitespace-nowrap ${status.chip}`}>{status.text}</span>
                </div>

                <div className="flex items-end justify-between">
                  <p className="font-headline-sm text-headline-sm font-extrabold text-on-surface">{money(b.spent)}</p>
                  <p className="font-label-md text-label-md text-on-surface-variant">de {money(b.amount_limit)}</p>
                </div>
                <ProgressBar percent={b.percent} tone={b.status} />
                <p className="font-label-md text-label-md text-on-surface-variant">
                  {b.remaining >= 0 ? `Te quedan ${money(b.remaining)} (${percent(b.percent)} usado)` : `Te pasaste por ${money(Math.abs(b.remaining))}`}
                </p>

                <div className="flex justify-end gap-space-xs">
                  <Button variant="soft" onClick={() => setEditing(b)}>
                    <Icon name="tune" className="text-[18px]" />
                    Ajustar
                  </Button>
                  <Button variant="ghost" onClick={() => remove(b)} aria-label="Eliminar presupuesto">
                    <Icon name="delete" className="text-[18px]" />
                  </Button>
                </div>
              </Card>
            );
          })}
        </section>
      )}

      {editing && (
        <Modal title={editing === 'new' ? 'Nuevo presupuesto' : 'Ajustar presupuesto'} onClose={() => setEditing(null)}>
          <BudgetForm
            budget={editing === 'new' ? null : editing}
            categories={expenseCategories}
            onClose={() => setEditing(null)}
            onSaved={saved}
          />
        </Modal>
      )}
    </div>
  );
}
