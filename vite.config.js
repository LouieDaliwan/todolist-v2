import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
// import typeScript from '@vuejs/plugin-type-script';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            // include: [/\.vue$/, /\.md$/],
        }),
    ],
});
