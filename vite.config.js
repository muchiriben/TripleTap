import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/scss/main.css',
                'resources/scss/nav.css',
                'resources/scss/gallery.css',
                'resources/scss/lightbox.css',
                'resources/scss/wishes.css',
                //'resources/js/anime.min.js',
                'resources/js/nav.js',
                'resources/js/lightbox-plus-jquery.js',
                'resources/js/particles-wishes.js',
            ],
            refresh: true,
        }),
    ],
});
