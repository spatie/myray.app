import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import forms from '@tailwindcss/forms';

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
        forms,
    ],
});
