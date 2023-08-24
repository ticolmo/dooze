import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';


export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/live.css','resources/js/live.js','resources/css/club.css', 'resources/css/admin.css','resources/js/app.js','resources/css/home1.css','resources/js/home.js','resources/js/admin.js'],
            refresh: true,
        }),
        vue(),
    ],
    resolve:{
        alias:{
            vue:'vue/dist/vue.esm-bundler.js',
        }
    }
});
