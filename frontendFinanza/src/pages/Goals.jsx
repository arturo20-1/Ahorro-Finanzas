import { useState } from 'react';
import { Link } from 'react-router-dom';
import { api, fieldError, isGeneralError } from '../api';
import { useFetch } from '../lib/hooks';
import { Alert, Button, Card, Empty, ErrorBox, Field, Icon, Loading, Modal, PageHeader, ProgressBar, inputClass } from '../components/ui';
import { money, percent, shortDate } from '../lib/format';

// Formulario para crear o editar una meta
function GoalForm({ goal, onClose, onSaved }) {
  const [form, setForm] = useState({
    name: goal ? goal.name : '',
    target_amount: goal ? goal.target_amount : '',
    current_amount: goal ? goal.current_amount : 0,
    target_date: goal && goal.target_date ? goal.target_date : '',
  });
  const [error, setError] = useState(null);
  const [saving, setSaving] = useState(false);

  const set = (key) => (e) => setForm((f) => ({ ...f, [key]: e.target.value }));

  const submit = async (e) => {
    e.preventDefault();
    setSaving(true);
    setError(null);
    try {
      await api(goal ? `/goals/${goal.id}` : '/goals', { method: goal ? 'PUT' : 'POST', body: form });
      onSaved();
    } catch (err) {
      setError(err);
      setSaving(false);
    }
  };

  return (
    <form onSubmit={submit} className="flex flex-col gap-space-md">
      {isGeneralError(error) && <Alert>{error.message}</Alert>}

      <Field label="Nombre de la meta" error={fieldError(error, 'name')}>
        <input className={inputClass} value={form.name} onChange={set('name')} placeholder="Ej: Fondo de emergencia" />
      </Field>

      <div className="grid grid-cols-2 gap-space-md">
        <Field label="Monto objetivo" error={fieldError(error, 'target_amount')}>
          <input className={inputClass} type="number" step="0.01" min="0" value={form.target_amount} onChange={set('target_amount')} />
        </Field>
        <Field label="Ya ahorrado" error={fieldError(error, 'current_amount')}>
          <input className={inputClass} type="number" step="0.01" min="0" value={form.current_amount} onChange={set('current_amount')} />
        </Field>
      </div>

      <Field label="Fecha límite (opcional)" error={fieldError(error, 'target_date')}>
        <input className={inputClass} type="date" value={form.target_date} onChange={set('target_date')} />
      </Field>

      <div className="flex justify-end gap-space-sm">
        <Button variant="ghost" onClick={onClose}>
          Cancelar
        </Button>
        <Button type="submit" loading={saving}>
          {goal ? 'Guardar cambios' : 'Crear meta'}
        </Button>
      </div>
    </form>
  );
}

// Formulario "Abonar fondos": el dinero sale de una cuenta y se suma a la meta
function ContributeForm({ goal, accounts, onClose, onSaved }) {
  const [amount, setAmount] = useState('');
  const [accountId, setAccountId] = useState(accounts[0] ? accounts[0].id : '');
  const [error, setError] = useState(null);
  const [saving, setSaving] = useState(false);

  const account = accounts.find((a) => String(a.id) === String(accountId));
  const value = Number(amount) || 0;
  // Las tarjetas de crédito pueden quedar en negativo; las demás cuentas necesitan saldo
  const notEnough = Boolean(account) && account.group !== 'credit' && value > account.balance;

  const submit = async (e) => {
    e.preventDefault();
    setSaving(true);
    setError(null);
    try {
      await api(`/goals/${goal.id}/contribute`, { method: 'POST', body: { amount, account_id: accountId } });
      onSaved();
    } catch (err) {
      setError(err);
      setSaving(false);
    }
  };

  if (accounts.length === 0) {
    return (
      <Empty icon="account_balance" title="Primero crea una cuenta">
        Necesitas una cuenta de la que salga el dinero.{' '}
        <Link to="/cuentas" className="text-primary hover:underline">
          Ir a Cuentas
        </Link>
      </Empty>
    );
  }

  return (
    <form onSubmit={submit} className="flex flex-col gap-space-md">
      {isGeneralError(error) && <Alert>{error.message}</Alert>}
      <p className="font-body-md text-body-md text-on-surface-variant">
        Llevas {money(goal.current_amount)} de {money(goal.target_amount)}.
      </p>

      <Field label="Cuenta de origen" error={fieldError(error, 'account_id')}>
        <select className={inputClass} value={accountId} onChange={(e) => setAccountId(e.target.value)}>
          {accounts.map((a) => (
            <option key={a.id} value={a.id}>
              {a.name} · {money(a.balance)} {a.currency}
            </option>
          ))}
        </select>
      </Field>

      <Field label="Monto a abonar" error={fieldError(error, 'amount')}>
        <input className={inputClass} type="number" step="0.01" min="0" value={amount} onChange={(e) => setAmount(e.target.value)} placeholder="0.00" />
      </Field>

      {account && (
        <p className={`font-label-md text-label-md ${notEnough ? 'text-error' : 'text-on-surface-variant'}`}>
          {notEnough
            ? `Saldo insuficiente: ${account.name} tiene ${money(account.balance)}.`
            : value > 0
              ? `${account.name} quedará con ${money(account.balance - value)}.`
              : `Saldo disponible en ${account.name}: ${money(account.balance)}.`}
        </p>
      )}

      <div className="flex justify-end gap-space-sm">
        <Button variant="ghost" onClick={onClose}>
          Cancelar
        </Button>
        <Button type="submit" loading={saving} disabled={notEnough}>
          Abonar
        </Button>
      </div>
    </form>
  );
}

export default function Goals() {
  const { data, error, loading, reload } = useFetch('/goals');
  const accounts = useFetch('/accounts'); // cuentas de las que puede salir un abono
  const [editing, setEditing] = useState(null); // null = cerrado, 'new' = crear, objeto = editar
  const [contributing, setContributing] = useState(null);
  const [filter, setFilter] = useState('all');
  const [actionError, setActionError] = useState(null);

  if (loading) return <Loading />;
  if (error) return <ErrorBox message={error} onRetry={reload} />;

  const all = data.data;
  const done = (g) => g.progress >= 100;
  const shown = filter === 'all' ? all : all.filter((g) => (filter === 'done' ? done(g) : !done(g)));

  const totalSaved = all.reduce((sum, g) => sum + g.current_amount, 0);
  const totalTarget = all.reduce((sum, g) => sum + g.target_amount, 0);
  const totalPercent = totalTarget > 0 ? Math.min(100, (totalSaved / totalTarget) * 100) : 0;

  const remove = async (goal) => {
    if (!window.confirm(`¿Eliminar la meta "${goal.name}"?`)) return;
    setActionError(null);
    try {
      await api(`/goals/${goal.id}`, { method: 'DELETE' });
      await reload();
    } catch (err) {
      setActionError(err.message);
    }
  };

  const saved = () => {
    setEditing(null);
    setContributing(null);
    reload();
    accounts.reload();
  };

  const tabs = [
    ['all', `Todas (${all.length})`],
    ['active', `En curso (${all.filter((g) => !done(g)).length})`],
    ['done', `Completadas (${all.filter(done).length})`],
  ];

  return (
    <div className="flex flex-col w-full pb-space-xl">
      <PageHeader title="Metas de Ahorro" subtitle="Define tus objetivos y mira tu avance hacia cada uno.">
        <Button onClick={() => setEditing('new')}>
          <Icon name="add_circle" className="text-[20px]" />
          Nueva meta
        </Button>
      </PageHeader>

      {actionError && (
        <div className="mb-space-md">
          <Alert>{actionError}</Alert>
        </div>
      )}

      <section className="grid grid-cols-1 sm:grid-cols-3 gap-space-md mb-space-lg">
        <Card>
          <p className="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Total ahorrado</p>
          <p className="font-headline-lg text-headline-lg font-extrabold text-primary mt-1">{money(totalSaved)}</p>
        </Card>
        <Card>
          <p className="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Objetivo combinado</p>
          <p className="font-headline-lg text-headline-lg font-extrabold text-on-surface mt-1">{money(totalTarget)}</p>
          <p className="font-label-sm text-label-sm text-on-surface-variant mt-1">Faltan {money(Math.max(0, totalTarget - totalSaved))}</p>
        </Card>
        <Card>
          <p className="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Progreso general</p>
          <p className="font-headline-lg text-headline-lg font-extrabold text-on-surface mt-1">{percent(totalPercent)}</p>
          <div className="mt-space-xs">
            <ProgressBar percent={totalPercent} />
          </div>
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
          <Empty icon="savings" title="No hay metas para mostrar">
            Crea una meta para empezar a ahorrar con un objetivo.
          </Empty>
        </Card>
      ) : (
        <section className="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-space-md">
          {shown.map((g) => (
            <Card key={g.id} className="flex flex-col gap-space-sm">
              <div className="flex items-center justify-between">
                <div className="flex items-center gap-space-sm min-w-0">
                  <div className="w-10 h-10 rounded-xl bg-tertiary-fixed text-on-tertiary-fixed flex items-center justify-center shrink-0">
                    <Icon name={done(g) ? 'task_alt' : 'savings'} className="text-[22px]" />
                  </div>
                  <div className="min-w-0">
                    <p className="font-label-lg text-label-lg text-on-surface truncate">{g.name}</p>
                    <p className="font-label-sm text-label-sm text-on-surface-variant">
                      {g.target_date ? `Meta: ${shortDate(g.target_date)}` : 'Sin fecha límite'}
                    </p>
                  </div>
                </div>
                <button
                  type="button"
                  aria-label="Eliminar meta"
                  onClick={() => remove(g)}
                  className="p-1 rounded-lg hover:bg-error-container text-on-surface-variant"
                >
                  <Icon name="delete" className="text-[20px]" />
                </button>
              </div>

              <div className="flex items-end justify-between">
                <p className="font-headline-sm text-headline-sm font-extrabold text-on-surface">{money(g.current_amount)}</p>
                <p className="font-label-md text-label-md text-on-surface-variant">de {money(g.target_amount)}</p>
              </div>
              <ProgressBar percent={g.progress} />
              <p className="font-label-md text-label-md text-on-surface-variant">
                {done(g) ? '¡Meta cumplida!' : `${percent(g.progress)} completado · faltan ${money(g.target_amount - g.current_amount)}`}
              </p>

              <div className="flex justify-end gap-space-xs">
                <Button variant="soft" onClick={() => setEditing(g)}>
                  <Icon name="tune" className="text-[18px]" />
                  Editar
                </Button>
                <Button onClick={() => setContributing(g)}>
                  <Icon name="add" className="text-[18px]" />
                  Abonar
                </Button>
              </div>
            </Card>
          ))}
        </section>
      )}

      {editing && (
        <Modal title={editing === 'new' ? 'Nueva meta de ahorro' : 'Editar meta'} onClose={() => setEditing(null)}>
          <GoalForm goal={editing === 'new' ? null : editing} onClose={() => setEditing(null)} onSaved={saved} />
        </Modal>
      )}
      {contributing && (
        <Modal title={`Abonar a "${contributing.name}"`} onClose={() => setContributing(null)}>
          {accounts.data ? (
            <ContributeForm goal={contributing} accounts={accounts.data.data} onClose={() => setContributing(null)} onSaved={saved} />
          ) : (
            <Loading />
          )}
        </Modal>
      )}
    </div>
  );
}
