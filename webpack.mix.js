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

mix.js('resources/js/app.js', '').vue()
    .babel(['public/vendor/web/app.js'], 'public/vendor/web/app.es5.js')
    .postCss('resources/css/app.css', '', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .webpackConfig(require('./webpack.config'))
    .setPublicPath('public/vendor/web')

if (mix.inProduction()) {
    mix.version();
}
