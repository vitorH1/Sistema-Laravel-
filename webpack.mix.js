const mix = require('laravel-mix');

mix.setPublicPath('public')
   .js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .version(); // Adicione isto para cache busting