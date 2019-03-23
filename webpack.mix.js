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

//mix.js('resources/js/app.js', 'public/js')   .sass('resources/sass/app.scss', 'public/css');
// mix.stylus('resources/stylus/app.styl', 'public/static/home/css');
mix.js('resources/js/home/app.js', 'public/static/home/js');
