const mix = require('laravel-mix');

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
mix.js('resources/js/libs.js', 'public/js/core/libs.min.js')
    .js('resources/js/external.js', 'public/js/core/external.min.js')
    .js('public/js/iqonic-script/setting.js', 'public/js/iqonic-script/setting.min.js')
    .js('public/js/iqonic-script/utility.js', 'public/js/iqonic-script/utility.min.js')
    .sass('resources/sass/libs.scss','public/css/libs.min.css')
    .sass('public/scss/qompac-ui.scss', 'public/css')
    .sass('public/scss/custom.scss', 'public/css')
    .sass('public/scss/dark.scss', 'public/css')
    .sass('public/scss/rtl.scss', 'public/css')
    .sass('public/scss/customizer.scss', 'public/css')
    .options({
        processCssUrls: false
    });
