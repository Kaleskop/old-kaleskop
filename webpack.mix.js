const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

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

mix.copyDirectory('resources/images', 'public/resources/images');
mix.copyDirectory('resources/videos', 'public/resources/videos');

mix.js('resources/js/app.js', 'public/js');
mix.js('resources/js/core/kaleshop.js', 'public/js');
mix.sass('resources/sass/app.scss', 'public/css')
 .options({
  processCssUrls: false,
  postCss: [
   tailwindcss('./resources/js/tailwind.js')
  ]
 });
