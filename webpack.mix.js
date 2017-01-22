let mix = require('laravel-mix').mix;

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .version();
    // .copy('node_modules/simplebar/umd/simplebar.css', 'public/vendor/simplebar.css');