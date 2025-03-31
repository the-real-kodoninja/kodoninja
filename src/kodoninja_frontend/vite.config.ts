// vite.config.ts
import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';

export default defineConfig({
  plugins: [react()],
  root: 'src', // Root where index.tsx and index.html are located (src/kodoninja_frontend/src)
  build: {
    outDir: '../../../dist', // Output to /home/kodoninja/kodoninja/dist
    emptyOutDir: true, // Ensure the output directory is emptied before build
  },
  server: {
    port: 4943,
    host: 'localhost',
  },
});