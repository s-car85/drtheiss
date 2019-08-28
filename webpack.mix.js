const { mix } = require('laravel-mix');

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

mix
   // .js('resources/assets/js/app.js', 'public/js/app.js')
    .sass('resources/assets/sass/app.scss', 'public/css/app-min.css').options({ processCssUrls: false })
     //.scripts([
     //'public/js/jquery.validate.js',
     //'public/js/responsiveslides.min.js'
     //], 'public/js/all-min.js')
    .styles([
        'public/fonts/fonts.css',
        'public/css/responsiveslides.css',
        'public/css/app-min.css'
    ], 'public/css/all-min.css');
