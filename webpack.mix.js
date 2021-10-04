const mix = require('laravel-mix');
require('laravel-mix-polyfill')

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

mix.js(['resources/js/app.js', 'resources/js/weakmap.js'], '').vue()
    .scripts([
        'resources/js/websocket/index.js',
        'resources/js/websocket/jquery-3.6.0.min.js'
    ], 'public/vendor/web/websocket.js')
    .babel(['public/vendor/web/app.js'], 'public/vendor/web/app.vanilla.js')
    .postCss('resources/css/app.css', '', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .webpackConfig(require('./webpack.config'))
    .setPublicPath('public/vendor/web')

if (mix.inProduction()) {
    mix.version();
}
