import { defineConfig } from 'vite';
import { fileURLToPath, URL } from 'node:url';
import laravel, {refreshPaths} from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],

            refresh:[
                ...refreshPaths,
                'app/Livewire/**',
            ],
        }),
        vue(),
    ],
    build: { chunkSizeWarningLimit: 1600,
    },
    resolve: {
        alias: {
            '@': fileURLToPath(new URL('./resources/js/src', import.meta.url))
        }
    }
});
