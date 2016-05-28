process.env.DISABLE_NOTIFIER = true;
var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');
    mix.sass('frontend.scss');
    mix.sass('backend.scss');

    mix.styles([
        'public/css/app.css',
        'resources/assets/libs/font-awesome/css/font-awesome.min.css',
    ], 'public/css/app.css', './');


    mix.copy('node_modules/bootstrap-sass/assets/fonts', 'public/build/fonts')
        .copy('resources/assets/libs/font-awesome/fonts', 'public/build/fonts');



    mix.scripts([
        'jquery-2.2.4.min.js',
        'jssor.slider.min.js'
    ],'public/js/main.js');

    mix.version(['css/app.css','css/frontend.css','css/backend.css','js/main.js']);
});
