import { useState } from 'react';
import { api, fieldError, isGeneralError } from '../api';
import { useFetch } from '../lib/hooks';
import { Alert, Button, Card, Empty, ErrorBox, Field, Icon, Loading, Modal, PageHeader, inputClass } from '../components/ui';
import { money, shortDate } from '../lib/format';

// Formulario para crear o editar una cuenta
function AccountForm({ account, options, onClose, onSaved }) {
  const [form, setForm] = useState({
    name: account ? account.name : '',
    type: account ? account.type : options.types[0].value,
    balance: account ? account.balance : 0,
    currency: account ? account.currency : 'USD',
  });
  const [error, setError] = useState(null);
  const [saving, setSaving] = useState(false);

  const set = (key) => (e) => setForm((f) => ({ ...f, [key]: e.target.value }));

  const submit = async (e) => {
    e.preventDefault();
    setSaving(true);
    setError(null);
    try {
      await api(account ? `/accounts/${account.id}` : '/accounts', { method: account ? 'PUT' : 'POST', body: form });
      onSaved();
    } catch (err) {
      setError(err);
      setSaving(false);
    }
  };

  return (
    <form onSubmit={submit} className="flex flex-col gap-space-md">
      {isGeneralError(error) && <Alert>{error.message}</Alert>}

      <Field label="Nombre de la cuenta" error={fieldError(error, 'name')}>
        <input className={inputClass} value={form.name} onChange={set('name')} placeholder="Ej: Banco Principal" />
      </Field>

      <div className="grid grid-cols-2 gap-space-md">
        <Field label="Tipo" error={fieldError(error, 'type')}>
          <select className={inputClass} value={form.type} onChange={set('type')}>
            {options.types.map((t) => (
              <option key={t.value} value={t.value}>
                {t.label}
              </option>
            ))}
          </select>
        </Field>
        <Field label="Moneda" error={fieldError(error, 'currency')}>
          <select className={inputClass} value={form.currency} onChange={set('currency')}>
            {options.currencies.map((c) => (
              <option key={c} value={c}>
                {c}
              </option>
            ))}
          </select>
        </Field>
      </div>

      <Field label="Saldo actual" error={fieldError(error, 'balance')}>
        <input className={inputClass} type="number" step="0.01" value={form.balance} onChange={set('balance')} />
      </Field>

      <div className="flex justify-end gap-space-sm">
        <Button variant="ghost" onClick={onClose}>
          Cancelar
        </Button>
        <Button type="submit" loading={saving}>
          {account ? 'Guardar cambios' : 'Crear cuenta'}
        </Button>
      </div>
    </form>
  );
}

export default function Accounts() {
  const { data, error, loading, reload } = useFetch('/accounts');
  const [editing, setEditing] = useState(null); // null = cerrado, 'new' = crear, objeto = editar
  const [busyId, setBusyId] = useState(null);
  const [actionError, setActionError] = useState(null);

  if (loading) return <Loading />;
  if (error) return <ErrorBox message={error} onRetry={reload} />;

  const accounts = data.data;
  const s = data.summary;
  const options = data.options;

  const remove = async (account) => {
    const ok = window.confirm(`¿Eliminar la cuenta "${account.name}"? También se borrarán sus ${account.transactions_count} transacciones.`);
    if (!ok) return;
    setBusyId(account.id);
    setActionError(null);
    try {
      await api(`/accounts/${account.id}`, { method: 'DELETE' });
      await reload();
    } catch (err) {
      setActionError(err.message);
    } finally {
      setBusyId(null);
    }
  };

  const saved = () => {
    setEditing(null);
    reload();
  };

  const typesText = [
    s.bank_count > 0 ? `${s.bank_count} bancaria${s.bank_count === 1 ? '' : 's'}` : null,
    s.credit_count > 0 ? `${s.credit_count} tarjeta${s.credit_count === 1 ? '' : 's'}` : null,
    s.cash_count > 0 ? `${s.cash_count} de efectivo` : null,
  ]
    .filter(Boolean)
    .join(' • ');

  return (
    <div className="flex flex-col w-full pb-space-xl">
      <PageHeader title="Cuentas Bancarias" subtitle="Administra tus cuentas, tarjetas y efectivo, y mira su movimiento del mes.">
        <Button onClick={() => setEditing('new')}>
          <Icon name="add_circle" className="text-[20px]" />
          Nueva cuenta
        </Button>
      </PageHeader>

      {actionError && (
        <div className="mb-space-md">
          <Alert>{actionError}</Alert>
        </div>
      )}

      <section className="grid grid-cols-1 sm:grid-cols-3 gap-space-md mb-space-lg">
        <Card>
          <p className="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Patrimonio neto</p>
          <p className="font-headline-lg text-headline-lg font-extrabold text-on-surface mt-1">{money(s.net_worth)}</p>
          <p className="font-label-sm text-label-sm text-on-surface-variant mt-1">{typesText || 'Aún sin cuentas'}</p>
        </Card>
        <Card>
          <p className="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Flujo del mes</p>
          <p className={`font-headline-lg text-headline-lg font-extrabold mt-1 ${s.month_flow >= 0 ? 'text-primary' : 'text-error'}`}>
            {s.month_flow >= 0 ? '+' : ''}
            {money(s.month_flow)}
          </p>
          <p className="font-label-sm text-label-sm text-on-surface-variant mt-1">ingresos menos gastos</p>
        </Card>
        <Card>
          <p className="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Movimientos del mes</p>
          <p className="font-headline-lg text-headline-lg font-extrabold text-on-surface mt-1">{s.month_transactions}</p>
          <p className="font-label-sm text-label-sm text-on-surface-variant mt-1">{s.accounts_count} cuentas en total</p>
        </Card>
      </section>

      {accounts.length === 0 ? (
        <Card>
          <Empty icon="account_balance" title="Todavía no tienes cuentas">
            Crea tu primera cuenta para empezar a registrar transacciones.
          </Empty>
        </Card>
      ) : (
        <section className="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-space-md">
          {accounts.map((a) => (
            <Card key={a.id} className="flex flex-col gap-space-sm">
              <div className="flex items-center justify-between">
                <div className="flex items-center gap-space-sm min-w-0">
                  <div className="w-10 h-10 rounded-xl bg-secondary-container text-on-secondary-container flex items-center justify-center shrink-0">
                    <Icon name={a.icon} className="text-[22px]" />
                  </div>
                  <div className="min-w-0">
                    <p className="font-label-lg text-label-lg text-on-surface truncate">{a.name}</p>
                    <p className="font-label-md text-label-md text-on-surface-variant">{a.type_label}</p>
                  </div>
                </div>
                <div className="flex items-center">
                  <button
                    type="button"
                    aria-label="Editar cuenta"
                    onClick={() => setEditing(a)}
                    className="p-1 rounded-lg hover:bg-surface-container-high text-on-surface-variant"
                  >
                    <Icon name="edit" className="text-[20px]" />
                  </button>
                  <button
                    type="button"
                    aria-label="Eliminar cuenta"
                    disabled={busyId === a.id}
                    onClick={() => remove(a)}
                    className="p-1 rounded-lg hover:bg-error-container text-on-surface-variant disabled:opacity-50"
                  >
                    <Icon name="delete" className="text-[20px]" />
                  </button>
                </div>
              </div>

              <p className={`font-headline-md text-headline-md font-extrabold ${a.balance < 0 ? 'text-error' : 'text-on-surface'}`}>
                {money(a.balance)} <span className="font-label-md text-label-md text-on-surface-variant font-normal">{a.currency}</span>
              </p>

              <div className="grid grid-cols-2 gap-space-sm font-label-md text-label-md">
                <span className="text-primary">+{money(a.month_income)} este mes</span>
                <span className="text-error">-{money(a.month_expenses)} este mes</span>
              </div>

              <p className="font-label-sm text-label-sm text-on-surface-variant">
                {a.transactions_count} movimientos · {a.last_movement ? `último: ${shortDate(a.last_movement)}` : 'sin movimientos'}
              </p>
            </Card>
          ))}
        </section>
      )}

      {editing && (
        <Modal title={editing === 'new' ? 'Nueva cuenta' : 'Editar cuenta'} onClose={() => setEditing(null)}>
          <AccountForm account={editing === 'new' ? null : editing} options={options} onClose={() => setEditing(null)} onSaved={saved} />
        </Modal>
      )}
    </div>
  );
}
