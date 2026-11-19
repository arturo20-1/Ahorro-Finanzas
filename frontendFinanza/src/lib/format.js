// Funciones para mostrar dinero, porcentajes y fechas.

export const money = (n) => {
  const v = Number(n) || 0;
  return (v < 0 ? '-' : '') + '$' + Math.abs(v).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
};

export const percent = (n) => `${(Number(n) || 0).toFixed(1)}%`;

// Texto de la variación contra el mes anterior (null = no hay datos para comparar)
export const changeText = (v) => (v === null || v === undefined ? 'Sin datos previos' : `${v >= 0 ? '+' : ''}${Number(v).toFixed(1)}%`);

// "2026-11-17" -> Date en hora local (evita el desfase de un día por la zona horaria)
export const parseDate = (iso) => {
  const [y, m, d] = String(iso).slice(0, 10).split('-').map(Number);
  return new Date(y, m - 1, d);
};

export const shortDate = (iso) => parseDate(iso).toLocaleDateString('es', { day: 'numeric', month: 'short', year: 'numeric' });

// "2026-11" -> "nov"
export const monthLabel = (ym) => {
  const [y, m] = ym.split('-').map(Number);
  return new Date(y, m - 1, 1).toLocaleDateString('es', { month: 'short' });
};

// Date -> "YYYY-MM-DD" en hora local
export const toISO = (d) => d.toLocaleDateString('en-CA');
export const today = () => toISO(new Date());
export const monthStart = () => {
  const d = new Date();
  return toISO(new Date(d.getFullYear(), d.getMonth(), 1));
};
export const monthEnd = () => {
  const d = new Date();
  return toISO(new Date(d.getFullYear(), d.getMonth() + 1, 0));
};
