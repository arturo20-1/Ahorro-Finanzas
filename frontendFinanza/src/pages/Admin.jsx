import { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { api, fieldError, isGeneralError } from '../api';
import { useAuth } from '../AuthContext';
import { useFetch } from '../lib/hooks';
import { Alert, Button, Card, Empty, ErrorBox, Field, Icon, Loading, ThemeToggle, inputClass } from '../components/ui';
import { money, shortDate } from '../lib/format';

// Formulario para crear una categoría global
function CategoryForm({ onSaved }) {
  const empty = { type: 'expense', name: '', color: '#3b82f6', icon: '' };
  const [form, setForm] = useState(empty);
  const [error, setError] = useState(null);
  const [saving, setSaving] = useState(false);

  const set = (key) => (e) => setForm((f) => ({ ...f, [key]: e.target.value }));

  const submit = async (e) => {
    e.preventDefault();
    setSaving(true);
    setError(null);
    try {
      await api('/admin/categories', { method: 'POST', body: { ...form, icon: form.icon || null } });
      setForm(empty);
      onSaved();
    } catch (err) {
      setError(err);
    } finally {
      setSaving(false);
    }
  };

  return (
    <form onSubmit={submit} className="flex flex-col gap-space-md">
      {isGeneralError(error) && <Alert>{error.message}</Alert>}

      <div className="grid grid-cols-2 gap-space-md">
        <Field label="Tipo" error={fieldError(error, 'type')}>
          <select className={inputClass} value={form.type} onChange={set('type')}>
            <option value="expense">Gasto</option>
            <option value="income">Ingreso</option>
          </select>
        </Field>
        <Field label="Color" error={fieldError(error, 'color')}>
          <input className={`${inputClass} h-[42px] p-1`} type="color" value={form.color} onChange={set('color')} />
        </Field>
      </div>

      <Field label="Nombre" error={fieldError(error, 'name')}>
        <input className={inputClass} value={form.name} onChange={set('name')} placeholder="Ej: Mascotas" />
      </Field>

      <Field label="Icono (opcional)" error={fieldError(error, 'icon')} hint="Nombre de Material Symbols, por ejemplo: pets">
        <input className={inputClass} value={form.icon} onChange={set('icon')} placeholder="pets" />
      </Field>

      <Button type="submit" loading={saving}>
        Crear categoría
      </Button>
    </form>
  );
}

export default function Admin() {
  const { user, logout } = useAuth();
  const navigate = useNavigate();
  const [page, setPage] = useState(1);
  const [filter, setFilter] = useState('all');

  const summary = useFetch('/admin/summary');
  const users = useFetch('/admin/users', { page });
  const categories = useFetch('/admin/categories');

  const handleLogout = async () => {
    await logout();
    navigate('/admin/login');
  };

  const metrics = summary.data
    ? [
        ['Usuarios', summary.data.data.users, 'group'],
        ['Cuentas', summary.data.data.accounts, 'account_balance'],
        ['Transacciones', summary.data.data.transactions, 'receipt_long'],
        ['Volumen transaccionado', money(summary.data.data.volume), 'payments'],
        ['Metas de ahorro', summary.data.data.goals, 'savings'],
        ['Categorías', summary.data.data.categories, 'category'],
      ]
    : [];

  const allCategories = categories.data ? categories.data.data : [];
  const shownCategories = filter === 'all' ? allCategories : allCategories.filter((c) => c.type === filter);

  const categorySaved = () => {
    categories.reload();
    summary.reload();
  };

  const userRows = users.data ? users.data.data : [];
  const meta = users.data ? users.data.meta : null;

  return (
    <div className="min-h-screen">
      <header className="h-16 bg-surface-container-lowest shadow-[0_1px_8px_rgba(0,0,0,0.04)] flex items-center justify-between px-space-lg">
        <div className="flex items-center gap-space-sm">
          <img alt="logo" className="h-9 w-auto object-contain" src="/logo.png" />
          <div>
            <p className="font-label-lg text-label-lg text-on-surface">Panel de administración</p>
            <p className="font-label-sm text-label-sm text-on-surface-variant">Modo administrador</p>
          </div>
        </div>
        <div className="flex items-center gap-space-sm">
          <span className="hidden md:block font-label-md text-label-md text-on-surface-variant">{user && user.email}</span>
          <ThemeToggle />
          <Button variant="soft" onClick={handleLogout}>
            <Icon name="logout" className="text-[18px]" />
            Salir
          </Button>
        </div>
      </header>

      <main className="px-space-lg py-space-lg flex flex-col gap-space-lg">
        <div>
          <h1 className="font-headline-lg text-headline-lg text-on-surface">Administración global</h1>
          <p className="font-body-md text-body-md text-on-surface-variant">Métricas de la plataforma, usuarios y categorías.</p>
        </div>

        {summary.error && <ErrorBox message={summary.error} onRetry={summary.reload} />}
        <section className="grid grid-cols-2 xl:grid-cols-6 gap-space-md">
          {metrics.map(([title, value, icon]) => (
            <Card key={title}>
              <div className="flex items-center justify-between">
                <span className="font-label-md text-label-md text-on-surface-variant">{title}</span>
                <Icon name={icon} className="text-[20px] text-primary" />
              </div>
              <p className="font-headline-md text-headline-md font-extrabold text-on-surface mt-1">{value}</p>
            </Card>
          ))}
        </section>

        <Card>
          <h2 className="font-headline-sm text-headline-sm text-on-surface mb-space-md">Gestión de usuarios</h2>
          {users.loading && !users.data ? (
            <Loading />
          ) : users.error ? (
            <ErrorBox message={users.error} onRetry={users.reload} />
          ) : userRows.length === 0 ? (
            <Empty icon="group" title="Aún no hay usuarios" />
          ) : (
            <>
              <div className="overflow-x-auto">
                <table className="w-full text-left">
                  <thead>
                    <tr className="font-label-md text-label-md text-on-surface-variant border-b border-outline-variant/40">
                      <th className="py-2 pr-space-md">Usuario</th>
                      <th className="py-2 pr-space-md">Correo</th>
                      <th className="py-2 pr-space-md">Registro</th>
                      <th className="py-2 pr-space-md">Cuentas</th>
                      <th className="py-2">Transacciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    {userRows.map((u) => (
                      <tr key={u.id} className="font-body-sm text-body-sm text-on-surface border-b border-outline-variant/20">
                        <td className="py-2 pr-space-md">
                          {u.name}
                          {u.is_admin && <span className="ml-2 px-2 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm">admin</span>}
                        </td>
                        <td className="py-2 pr-space-md">{u.email}</td>
                        <td className="py-2 pr-space-md whitespace-nowrap">{u.created_at ? shortDate(u.created_at) : '-'}</td>
                        <td className="py-2 pr-space-md">{u.accounts_count}</td>
                        <td className="py-2">{u.transactions_count}</td>
                      </tr>
                    ))}
                  </tbody>
                </table>
              </div>
              <div className="flex items-center justify-between mt-space-md">
                <span className="font-label-md text-label-md text-on-surface-variant">
                  Página {meta.current_page} de {meta.last_page} · {meta.total} usuarios
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

        <section className="grid grid-cols-1 xl:grid-cols-3 gap-space-md">
          <Card className="xl:col-span-2">
            <div className="flex flex-wrap items-center justify-between gap-space-sm mb-space-md">
              <h2 className="font-headline-sm text-headline-sm text-on-surface">Categorías financieras</h2>
              <div className="flex gap-space-xs">
                {[
                  ['all', 'Todas'],
                  ['expense', 'Gastos'],
                  ['income', 'Ingresos'],
                ].map(([value, text]) => (
                  <button
                    key={value}
                    type="button"
                    onClick={() => setFilter(value)}
                    className={`px-space-md py-1 rounded-xl font-label-md text-label-md ${
                      filter === value ? 'bg-primary text-on-primary' : 'bg-surface-container-low text-on-surface-variant'
                    }`}
                  >
                    {text}
                  </button>
                ))}
              </div>
            </div>

            {categories.loading && !categories.data ? (
              <Loading />
            ) : categories.error ? (
              <ErrorBox message={categories.error} onRetry={categories.reload} />
            ) : (
              <ul className="grid grid-cols-1 md:grid-cols-2 gap-space-sm">
                {shownCategories.map((c) => (
                  <li key={c.id} className="flex items-center gap-space-sm bg-surface-container-low rounded-xl p-space-sm">
                    <div className="w-9 h-9 rounded-lg flex items-center justify-center" style={{ backgroundColor: `${c.color || '#6d7a72'}22`, color: c.color || '#6d7a72' }}>
                      <Icon name={c.icon || 'sell'} className="text-[20px]" />
                    </div>
                    <div className="min-w-0 flex-1">
                      <p className="font-label-lg text-label-lg text-on-surface truncate">{c.name}</p>
                      <p className="font-label-sm text-label-sm text-on-surface-variant">
                        {c.type === 'expense' ? 'Gasto' : 'Ingreso'} · {c.transactions_count} transacciones
                      </p>
                    </div>
                  </li>
                ))}
              </ul>
            )}
          </Card>

          <Card>
            <h2 className="font-headline-sm text-headline-sm text-on-surface mb-space-md">Nueva categoría global</h2>
            <CategoryForm onSaved={categorySaved} />
          </Card>
        </section>
      </main>
    </div>
  );
}
