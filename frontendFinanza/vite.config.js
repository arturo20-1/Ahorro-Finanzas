import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';

// Dirección del backend de Laravel (php artisan serve)
const BACKEND = 'http://127.0.0.1:8000';

export default defineConfig({
  plugins: [react()],
  server: {
    port: 5173,
    // Todo lo que empiece con /api se reenvía al backend. Para el navegador, la página y la API están en el
    // mismo origen (localhost:5173), así que la cookie del token funciona sin reglas de CORS ni de terceros.
    proxy: {
      '/api': { target: BACKEND, changeOrigin: true },
    },
  },
});
