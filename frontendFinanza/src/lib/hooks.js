import { useCallback, useEffect, useRef, useState } from 'react';
import { api } from '../api';

// Pide datos a la API y los vuelve a pedir si cambian los parámetros.
// Devuelve { data, error, loading, reload }.
export function useFetch(path, params) {
  const [state, setState] = useState({ data: null, error: null, loading: true });
  const counter = useRef(0);
  const key = path + JSON.stringify(params || {});

  const load = useCallback(async () => {
    const id = ++counter.current;
    setState((s) => ({ ...s, loading: true, error: null }));
    try {
      const data = await api(path, { params });
      if (id === counter.current) setState({ data, error: null, loading: false });
    } catch (e) {
      if (id === counter.current) setState({ data: null, error: e.message, loading: false });
    }
  }, [key]);

  useEffect(() => {
    load();
  }, [load]);

  return { ...state, reload: load };
}
