import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import basicSsl from '@vitejs/plugin-basic-ssl'
// import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        basicSsl(),
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: 
            'app/Livewire/**',
        }),
        // vue(),
    ],
    define: {
        global: 'window',
    }
});
