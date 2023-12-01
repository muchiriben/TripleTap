import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/scss/main.scss',
                'resources/scss/nav.scss',
                'resources/scss/gallery.scss',
                'resources/scss/lightbox.scss',
                'resources/js/anime.min.js',
                'resources/js/nav.js',
                'resources/js/lightbox-plus-jquery.js',
            ],
            refresh: true,
        }),
    ],
});
