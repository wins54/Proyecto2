const mix = require('laravel-mix');


mix.styles([
   //'resources/assets/plantilla/css/font-face.css',
   //'resources/assets/plantilla/vendor/font-awesome-4.7/css/font-awesome.min.css',
  // 'resources/assets/plantilla/vendor/font-awesome-5/css/fontawesome-all.min.css',
   //'resources/assets/plantilla/vendor/mdi-font/css/material-design-iconic-font.min.css',
 
   'resources/assets/plantilla/vendor/bootstrap-4.1/bootstrap.min.css',
   'resources/assets/plantilla/vendor/animsition/animsition.min.css',
   'resources/assets/plantilla/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css',
   'resources/assets/plantilla/vendor/wow/animate.css',
   'resources/assets/plantilla/vendor/css-hamburgers/hamburgers.min.css',
   'resources/assets/plantilla/vendor/slick/slick.css',
   'resources/assets/plantilla/vendor/select2/select2.min.css',
   'resources/assets/plantilla/vendor/perfect-scrollbar/perfect-scrollbar.css',
   'resources/assets/plantilla/bootstrap-select-1.13.2/dist/css/bootstrap-select.css',
   'resources/assets/plantilla/css/theme.css',
], 'public/css/all.css')
   .scripts([
      
      'resources/assets/plantilla/vendor/jquery-3.2.1.min.js',
      'resources/assets/plantilla/vendor/bootstrap-4.1/popper.min.js',
      'resources/assets/plantilla/vendor/bootstrap-4.1/bootstrap.min.js',
      'resources/assets/plantilla/vendor/slick/slick.min.js',
      'resources/assets/plantilla/vendor/wow/wow.min.js',
      'resources/assets/plantilla/vendor/animsition/animsition.min.js',
      //'resources/assets/plantilla/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js',
      //'resources/assets/plantilla/vendor/counter-up/jquery.waypoints.min.js',
      //'resources/assets/plantilla/vendor/counter-up/jquery.counterup.min.js',
     // 'resources/assets/plantilla/vendor/circle-progress/circle-progress.min.js',
     // 'resources/assets/plantilla/vendor/perfect-scrollbar/perfect-scrollbar.js',
     //  'resources/assets/plantilla/vendor/chartjs/Chart.bundle.min.js',
      'resources/assets/plantilla/vendor/select2/select2.min.js',
      //'resources/assets/plantilla/bootstrap-select-1.13.2/dist/js/bootstrap-select.js',
      'resources/assets/plantilla/js/main.js',
      'resources/assets/plantilla/js/Chart.min.js',

   ], 'public/js/plantilla.js')
mix.js('resources/js/app.js', 'public/js')
