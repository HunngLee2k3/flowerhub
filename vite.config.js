import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/custom.css', // Thêm file CSS
                
                'resources/js/app.js',
                'resources/js/custom.js'    // Thêm file JS
            ],
            refresh: true,
        }),
    ],
});
