import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import path from 'path';



export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/bootstrap.scss','resources/js/bootstrapjs.js','resources/css/live.css','resources/js/live.js','resources/css/app.css', 'resources/css/admin.css','resources/js/app.js','resources/css/home.css','resources/js/home.js','resources/js/admin.js'],
            refresh: true,
        }),
        react(),
    ],
    resolve:{
        alias:{
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
            
        }
    }
});
