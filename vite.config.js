import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fullReload from 'vite-plugin-full-reload';
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    server: {
        host: 'localhost',
        port: 5173,
        strictPort: true,
        hmr: {
            host: 'localhost',
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        fullReload([
            'resources/views/**/*.blade.php',
            'routes/**/*.php',
            'app/**/*.php',
        ]),
        tailwindcss(),
    ],
});
