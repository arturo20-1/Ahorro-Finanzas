import { useState } from 'react';
import { api, fieldError, isGeneralError } from '../api';
import { useAuth } from '../AuthContext';
import { Alert, Button, Card, Field, Icon, PageHeader, ThemeToggle, inputClass } from '../components/ui';

// Datos del perfil: nombre y correo
function ProfileForm() {
  const { user, setUser } = useAuth();
  const [form, setForm] = useState({ name: user.name, email: user.email });
  const [error, setError] = useState(null);
  const [saved, setSaved] = useState(false);
  const [saving, setSaving] = useState(false);

  const set = (key) => (e) => {
    setForm((f) => ({ ...f, [key]: e.target.value }));
    setSaved(false);
  };

  const submit = async (e) => {
    e.preventDefault();
    setSaving(true);
    setError(null);
    setSaved(false);
    try {
      const res = await api('/profile', { method: 'PUT', body: form });
      setUser(res.data);
      setSaved(true);
    } catch (err) {
      setError(err);
    } finally {
      setSaving(false);
    }
  };

  return (
    <Card>
      <h2 className="font-headline-sm text-headline-sm text-on-surface mb-space-md flex items-center gap-space-xs">
        <Icon name="person" /> Perfil de usuario
      </h2>
      <form onSubmit={submit} className="flex flex-col gap-space-md">
        {isGeneralError(error) && <Alert>{error.message}</Alert>}
        {saved && <Alert type="success">Perfil actualizado.</Alert>}

        <Field label="Nombre completo" error={fieldError(error, 'name')}>
          <input className={inputClass} value={form.name} onChange={set('name')} autoComplete="name" />
        </Field>
        <Field label="Correo electrónico" error={fieldError(error, 'email')}>
          <input className={inputClass} type="email" value={form.email} onChange={set('email')} autoComplete="email" />
        </Field>

        <div className="flex justify-end">
          <Button type="submit" loading={saving}>
            Guardar cambios
          </Button>
        </div>
      </form>
    </Card>
  );
}

// Cambio de contraseña
function PasswordForm() {
  const empty = { current_password: '', password: '', password_confirmation: '' };
  const [form, setForm] = useState(empty);
  const [error, setError] = useState(null);
  const [saved, setSaved] = useState(false);
  const [saving, setSaving] = useState(false);

  const set = (key) => (e) => {
    setForm((f) => ({ ...f, [key]: e.target.value }));
    setSaved(false);
  };

  const submit = async (e) => {
    e.preventDefault();
    setSaving(true);
    setError(null);
    setSaved(false);
    try {
      await api('/profile/password', { method: 'PUT', body: form });
      setForm(empty);
      setSaved(true);
    } catch (err) {
      setError(err);
    } finally {
      setSaving(false);
    }
  };

  return (
    <Card>
      <h2 className="font-headline-sm text-headline-sm text-on-surface mb-space-md flex items-center gap-space-xs">
        <Icon name="shield" /> Seguridad
      </h2>
      <form onSubmit={submit} className="flex flex-col gap-space-md">
        {isGeneralError(error) && <Alert>{error.message}</Alert>}
        {saved && <Alert type="success">Contraseña actualizada. Tus otras sesiones se cerraron.</Alert>}

        <Field label="Contraseña actual" error={fieldError(error, 'current_password')}>
          <input className={inputClass} type="password" value={form.current_password} onChange={set('current_password')} autoComplete="current-password" />
        </Field>
        <Field label="Nueva contraseña" error={fieldError(error, 'password')} hint="Mínimo 8 caracteres">
          <input className={inputClass} type="password" value={form.password} onChange={set('password')} autoComplete="new-password" />
        </Field>
        <Field label="Repite la nueva contraseña">
          <input className={inputClass} type="password" value={form.password_confirmation} onChange={set('password_confirmation')} autoComplete="new-password" />
        </Field>

        <div className="flex justify-end">
          <Button type="submit" loading={saving}>
            Cambiar contraseña
          </Button>
        </div>
      </form>
    </Card>
  );
}

export default function Settings() {
  return (
    <div className="flex flex-col w-full pb-space-xl">
      <PageHeader title="Configuración de la cuenta" subtitle="Administra tu perfil, tu contraseña y la apariencia de la app." />

      <section className="grid grid-cols-1 xl:grid-cols-2 gap-space-md">
        <ProfileForm />
        <PasswordForm />
        <Card>
          <h2 className="font-headline-sm text-headline-sm text-on-surface mb-space-sm flex items-center gap-space-xs">
            <Icon name="palette" /> Apariencia
          </h2>
          <div className="flex items-center justify-between">
            <p className="font-body-md text-body-md text-on-surface-variant">Cambia entre modo claro y oscuro.</p>
            <ThemeToggle />
          </div>
        </Card>
      </section>
    </div>
  );
}
