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
 /*
  mix.styles([
    'resources/less/styles_main.less',
    'resources/less/adatkiiras_kepernyore.less',
    'resources/less/menurendszer.less',
    'resources/less/login.less',
    'resources/less/fomenu.less',
    'resources/less/asztal_hatter.less',
    'resources/less/bevitel.less'
	], 'resources/less/styles.less');
  */
mix.js('resources/js/app.js', 'public/js')
	.less('resources/less/styles.less', 'public/css')
    .sass('resources/sass/app.scss', 'public/css');
