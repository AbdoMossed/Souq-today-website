const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/souq.js', 'public/js')
    .sass('resources/scss/app.scss', 'public/css')
    .sass('resources/scss/rtl.scss', 'public/css')
    .css('resources/css/souq.css', 'public/css')
    .copyDirectory('resources/fonts/dinnext', 'public/fonts/dinnext')
    .copyDirectory('resources/images', 'public/images')
    .sourceMaps();
