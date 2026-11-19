import { Navigate, Route, Routes, useLocation } from 'react-router-dom';
import { useAuth } from './AuthContext';
import Layout from './components/Layout';
import { Loading } from './components/ui';
import Welcome from './pages/Welcome';
import Login from './pages/Login';
import AdminLogin from './pages/AdminLogin';
import Admin from './pages/Admin';
import Dashboard from './pages/Dashboard';
import Transactions from './pages/Transactions';
import Budgets from './pages/Budgets';
import Goals from './pages/Goals';
import Analytics from './pages/Analytics';
import Accounts from './pages/Accounts';
import Settings from './pages/Settings';

// Solo deja pasar a usuarios con sesión; si no, los manda al login
function RequireAuth({ children }) {
  const { user, loading } = useAuth();
  const location = useLocation();

  if (loading) return <Loading />;
  if (!user) return <Navigate to="/login" replace state={{ from: location.pathname }} />;
  return children;
}

// Solo deja pasar a administradores
function RequireAdmin({ children }) {
  const { user, loading } = useAuth();

  if (loading) return <Loading />;
  if (!user || !user.is_admin) return <Navigate to="/admin/login" replace />;
  return children;
}

export default function App() {
  return (
    <Routes>
      <Route path="/" element={<Welcome />} />
      <Route path="/login" element={<Login />} />
      <Route path="/admin/login" element={<AdminLogin />} />
      <Route
        path="/admin"
        element={
          <RequireAdmin>
            <Admin />
          </RequireAdmin>
        }
      />

      {/* Pantallas privadas: comparten el menú lateral (Layout) */}
      <Route
        element={
          <RequireAuth>
            <Layout />
          </RequireAuth>
        }
      >
        <Route path="/dashboard" element={<Dashboard />} />
        <Route path="/transacciones" element={<Transactions />} />
        <Route path="/presupuestos" element={<Budgets />} />
        <Route path="/metas" element={<Goals />} />
        <Route path="/reportes" element={<Analytics />} />
        <Route path="/cuentas" element={<Accounts />} />
        <Route path="/configuracion" element={<Settings />} />
      </Route>

      <Route path="*" element={<Navigate to="/" replace />} />
    </Routes>
  );
}
