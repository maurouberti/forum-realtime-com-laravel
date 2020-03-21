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

mix.js('resources/js/bootstrap.js', 'public/js/bootstrap.js');
mix.js('resources/js/topicos/app.js', 'public/js/topicos.js');
mix.js('resources/js/respostas/app.js', 'public/js/respostas.js')
    .sass('resources/sass/app.scss', 'public/css')
    .extract(['vue']);
