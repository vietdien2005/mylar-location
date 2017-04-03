const { mix } = require('laravel-mix');

mix.scripts([
	"resources/assets/js/jquery.js",
	"resources/assets/js/bootstrap.min.js",
	"resources/assets/js/jquery.dcjqaccordion.2.7.js",
	"resources/assets/js/bootstrap-switch.js",
	"resources/assets/js/jquery.scrollTo.min.js",
	"resources/assets/js/jquery.nicescroll.js",
	"resources/assets/js/jquery.sparkline.js",
	"resources/assets/js/owl.carousel.js",
	"resources/assets/js/jquery.customSelect.min.js",
	"resources/assets/js/bootstrap-datetimepicker.js",
	"resources/assets/js/respond.min.js",
	"resources/assets/js/slidebars.min.js",
	"resources/assets/js/common-scripts.js",
],'public/js/app.js')
.version();

mix.styles([ 
	"resources/assets/css/bootstrap.min.css",
	"resources/assets/css/bootstrap-reset.css",
	"resources/assets/css/font-awesome.min.css",
	"resources/assets/css/owl.carousel.css",
	"resources/assets/css/slidebars.css",
	"resources/assets/css/datetimepicker.css",
	"resources/assets/css/style.css",
	"resources/assets/css/style-responsive.css",
],'public/css/app.css')
.version();

mix.scripts([
	"resources/assets/js/jquery.js",
	"resources/assets/js/jquery-migrate-1.2.1.min.js",
	"resources/assets/js/bootstrap.min.js",
	"resources/assets/js/spin.min.js",
	"resources/assets/js/jquery.autosize.min.js",
	"resources/assets/js/jquery.nanoscroller.min.js",
	"resources/assets/js/App.js",
	"resources/assets/js/AppNavigation.js",
	"resources/assets/js/AppOffcanvas.js",
	"resources/assets/js/AppCard.js",
	"resources/assets/js/AppForm.js",
	"resources/assets/js/AppNavSearch.js",
	"resources/assets/js/AppVendor.js",
	"resources/assets/js/Demo.js",
],'public/js/home.js')
.version();

mix.styles([ 
	"resources/assets/css/bootstrap.min.css",
	"resources/assets/css/materialadmin.css",
	"resources/assets/css/font-awesome.min.css",
	"resources/assets/css/material-design-iconic-font.min.css",
	"resources/assets/css/homepage.css",
],'public/css/home.css')
.version();

mix.copy('resources/assets/fonts','public/fonts');
mix.copy('resources/assets/images','public/img');