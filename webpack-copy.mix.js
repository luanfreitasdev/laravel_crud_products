const mix = require('laravel-mix');

mix.scripts('node_modules/jquery/dist/jquery.js', 'public/assets/js/jquery.js')
    .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/assets/js/bootstrap.js')
    .scripts('node_modules/@fortawesome/fontawesome-free/js/all.js', 'public/assets/js/fontawesome.js')
    .scripts('node_modules/bootstrap-select/dist/js/bootstrap-select.js', 'public/assets/js/bootstrap-select.js')
    .scripts('node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js', 'public/assets/js/jquery.bootstrap-touchspin.js')
    .scripts('node_modules/counter/index.js', 'public/assets/js/counter.js')
    .scripts('node_modules/perfect-scrollbar/dist/perfect-scrollbar.js', 'public/assets/js/perfect-scrollbar.js')
    .scripts('node_modules/select2/dist/js/select2.full.js', 'public/assets/js/select2.full.js')
    // Template
    .scripts('public/assets/js/app.js', 'public/assets/js/app.js')
    .scripts('public/assets/js/custom.js', 'public/assets/js/custom.js')
    .scripts('public/assets/js/dashboard/dash_2.js', 'public/assets/js/dashboard/dash_2.js')
    .scripts('public/assets/js/loader.js', 'public/assets/js/loader.js')
    .version();

mix.sass('node_modules/bootstrap/scss/bootstrap.scss', 'public/assets/css/bootstrap.css')
    .sass('node_modules/@fortawesome/fontawesome-free/scss/fontawesome.scss', 'public/assets/css/fontawesome.css')
    .styles('node_modules/select2/dist/css/select2.css', 'public/assets/css/select2.css')
    .sass('node_modules/bootstrap-select/sass/bootstrap-select.scss', 'public/assets/css/bootstrap-select.css')
    .styles('node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css', 'public/assets/css/jquery.bootstrap-touchspin.css')
    .styles('node_modules/perfect-scrollbar/css/perfect-scrollbar.css', 'public/assets/css/perfect-scrollbar.css')
    // Template
    .styles('public/assets/css/plugins.css', 'public/assets/css/plugins.css')
    .styles('public/assets/css/structure.css', 'public/assets/css/structure.css')
    .styles('public/assets/css/dashboard/dash_2.css', 'public/assets/css/dashboard/dash_2.css')
    .styles('public/assets/css/loader.css', 'public/assets/css/loader.css')
    .version();


mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
