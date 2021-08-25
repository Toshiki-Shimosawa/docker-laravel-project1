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
    .sass('resources/sass/app.scss', 'public/css')
    .ts('resources/ts/app.ts', 'public/js/app.js')
    .ts('resources/ts/admin.ts', 'public/js/app.js')
    .ts('resources/ts/top.ts', 'public/js/top.js')
    .sourceMaps();
