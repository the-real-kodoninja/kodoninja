// vite.config.ts
import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';

export default defineConfig({
  plugins: [react()],
  root: 'src', // Root where index.tsx and index.html are located
  build: {
    outDir: '../../../dist', // Adjusted to match the expected path
    emptyOutDir: true, // Ensure the output directory is emptied before build
  },
  server: {
    port: 4943,
    host: 'localhost',
  },
});