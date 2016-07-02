process.env.DISABLE_NOTIFIER = true;
var elixir = require('laravel-elixir');

require('laravel-elixir-vueify');

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
    mix.copy('node_modules/bootstrap-sass/assets/fonts', 'public/build/fonts')
        .copy('node_modules/font-awesome/fonts', 'public/build/fonts')
        .copy('node_modules/trumbowyg/dist/trumbowyg.min.js', 'public/js')
        .copy('node_modules/trumbowyg/dist/ui/icons.svg', 'public/js/ui');

    mix.sass('app.scss');
    mix.sass('frontend.scss');
    mix.sass('backend.scss');

    mix.styles([
        'node_modules/animate.css/animate.min.css',
        'node_modules/font-awesome/css/font-awesome.min.css',
        'node_modules/animate.css/animate.css',
        'node_modules/trumbowyg/dist/ui/trumbowyg.min.css',
        'public/css/app.css',
    ], 'public/css/app.css', './');

    mix.browserify('app.js');
    mix.scripts([
        'resources/assets/js/jquery-2.2.4.min.js',
        'resources/assets/js/jssor.slider.min.js',
    ],'public/js/main.js','./');

    mix.version([
        'css/app.css',
        'css/frontend.css',
        'css/backend.css',
        'js/main.js'
    ]);
});
