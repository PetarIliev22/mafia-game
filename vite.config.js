import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
     server: {
        host: '192.168.1.105',
        port: 5173,
        strictPort: true,
        origin: 'http://192.168.1.105:5173',

        cors: {
            origin: 'http://192.168.1.105:8000',
        },

        hmr: {
            host: '192.168.1.105',
            port: 5173,
        },
    },

    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/js/app.js',
            ],
            refresh: [
                'resources/views/**/*.blade.php',
                'routes/**/*.php',
            ],
        }),
    ],
});
