const mix = require("laravel-mix")

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
  .js("resources/js/app.js", "dist/js")
  .js("resources/js/reader.js", "dist/js")
  .js("resources/js/theme.js", "dist/js")
  .sass('resources/sass/main.scss', 'dist/css')