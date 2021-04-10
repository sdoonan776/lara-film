const mix = require('laravel-mix');
const LodashModuleReplacementPlugin = require('lodash-webpack-plugin');

mix.disableNotifications();

mix.js('resources/assets/js/app.js', 'public/js')
    .webpackConfig({
        plugins: [
            new LodashModuleReplacementPlugin
        ]
    }).version();
mix.sass('resources/assets/sass/app.scss', 'public/css')
    .version();
