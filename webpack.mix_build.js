const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

// demo 7 bulndle 


mix.scripts([
	'node_modules/jquery/dist/jquery.js',
	'node_modules/popper.js/dist/umd/popper.js',
	'node_modules/bootstrap/dist/js/bootstrap.min.js',
	'node_modules/js-cookie/src/js.cookie.js',
	'node_modules/moment/min/moment.min.js',
	'node_modules/tooltip.js/dist/umd/tooltip.min.js',
	'node_modules/perfect-scrollbar/dist/perfect-scrollbar.js',
	'node_modules/sticky-js/dist/sticky.min.js',
	'node_modules/wnumb/wNumb.js',
	'node_modules/jquery-form/dist/jquery.form.min.js',
	'node_modules/block-ui/jquery.blockUI.js',
	'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
	'node_modules/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js',
	'node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js',
	'node_modules/bootstrap-daterangepicker/daterangepicker.js',
	'node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js',
	'node_modules/bootstrap-maxlength/src/bootstrap-maxlength.js',
	'node_modules/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js',
	'node_modules/bootstrap-select/dist/js/bootstrap-select.js',
	'node_modules/bootstrap-switch/dist/js/bootstrap-switch.js',
	'node_modules/select2/dist/js/select2.full.js',
	'node_modules/ion-rangeslider/js/ion.rangeSlider.js',
	'node_modules/typeahead.js/dist/typeahead.bundle.js',
	'node_modules/handlebars/dist/handlebars.js',
	'node_modules/inputmask/dist/jquery.inputmask.bundle.js',
	'node_modules/inputmask/dist/inputmask/inputmask.date.extensions.js',
	'node_modules/inputmask/dist/inputmask/inputmask.numeric.extensions.js',
	'node_modules/nouislider/distribute/nouislider.js',
	'node_modules/owl.carousel/dist/owl.carousel.js',
	'node_modules/autosize/dist/autosize.js',
	'node_modules/clipboard/dist/clipboard.min.js',
	'node_modules/dropzone/dist/dropzone.js',
	'node_modules/summernote/dist/summernote.js',
	'node_modules/markdown/lib/markdown.js',
	'node_modules/bootstrap-markdown/js/bootstrap-markdown.js',
	'node_modules/bootstrap-notify/bootstrap-notify.min.js',
	'node_modules/jquery-validation/dist/jquery.validate.js',
	'node_modules/jquery-validation/dist/additional-methods.js',
	'node_modules/toastr/build/toastr.min.js',
	'node_modules/raphael/raphael.js',
	'node_modules/morris.js/morris.js',
	'node_modules/chart.js/dist/Chart.bundle.js',
	'node_modules/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js',
	'node_modules/vendors/jquery-idletimer/idle-timer.min.js',
	'node_modules/waypoints/lib/jquery.waypoints.js',
	'node_modules/counterup/jquery.counterup.js',
	'node_modules/es6-promise-polyfill/promise.min.js',
	'node_modules/sweetalert2/dist/sweetalert2.min.js',
	'node_modules/jquery.repeater/src/lib.js',
	'node_modules/jquery.repeater/src/jquery.input.js',
	'node_modules/jquery.repeater/src/repeater.js',
	'node_modules/dompurify/dist/purify.js'
	], 'public/vendor.js')

mix.styles([
	'node_modules/perfect-scrollbar/css/perfect-scrollbar.css',
	'node_modules/tether/dist/css/tether.css',
	'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css',
	'node_modules/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css',
	'node_modules/bootstrap-timepicker/css/bootstrap-timepicker.css',
	'node_modules/bootstrap-daterangepicker/daterangepicker.css',
	'node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css',
	'node_modules/bootstrap-select/dist/css/bootstrap-select.css',
	'node_modules/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css',
	'node_modules/select2/dist/css/select2.css',
	'node_modules/ion-rangeslider/css/ion.rangeSlider.css',
	'node_modules/nouislider/distribute/nouislider.css',
	'node_modules/owl.carousel/dist/assets/owl.carousel.css',
	'node_modules/owl.carousel/dist/assets/owl.theme.default.css',
	'node_modules/dropzone/dist/dropzone.css',
	'node_modules/summernote/dist/summernote.css',
	'node_modules/bootstrap-markdown/css/bootstrap-markdown.min.css',
	'node_modules/animate.css/animate.css',
	'node_modules/toastr/build/toastr.css',
	'node_modules/morris.js/morris.css',
	'node_modules/sweetalert2/dist/sweetalert2.css',
	'node_modules/socicon/css/socicon.css',
	'node_modules/vendors/line-awesome/css/line-awesome.css',
	'node_modules/vendors/flaticon/flaticon.css',
	'node_modules/vendors/flaticon2/flaticon.css',
	'node_modules/@fortawesome/fontawesome-free/css/all.min.css'
	], 'public/vendor.css')

mix.scripts([
	'node_modules/fullcalendar/dist/fullcalendar.js',
	'node_modules/fullcalendar/dist/gcal.js',
	'node_modules/gmaps/gmaps.js',
	'node_modules/jquery-flot/jquery.flot.js',
	'node_modules/jquery-flot/jquery.flot.resize.js',
	'node_modules/jquery-flot/jquery.flot.categories.js',
	'node_modules/jquery-flot/jquery.flot.pie.js',
	'node_modules/jquery-flot/jquery.flot.stack.js',
	'node_modules/jquery-flot/jquery.flot.crosshair.js',
	'node_modules/jquery-flot/jquery.flot.axislabels.js',
	'node_modules/datatables.net/js/jquery.dataTables.js',
	'node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js',
	'node_modules/datatables.net-autofill/js/dataTables.autoFill.min.js',
	'node_modules/datatables.net-autofill-bs4/js/autoFill.bootstrap4.min.js',
	'node_modules/jszip/dist/jszip.min.js',
	'node_modules/pdfmake/build/pdfmake.min.js',
	'node_modules/pdfmake/build/vfs_fonts.js',
	'node_modules/datatables.net-buttons/js/dataTables.buttons.min.js',
	'node_modules/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js',
	'node_modules/datatables.net-buttons/js/buttons.colVis.js',
	'node_modules/datatables.net-buttons/js/buttons.flash.js',
	'node_modules/datatables.net-buttons/js/buttons.html5.js',
	'node_modules/datatables.net-buttons/js/buttons.print.js',
	'node_modules/datatables.net-colreorder/js/dataTables.colReorder.min.js',
	'node_modules/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js',
	'node_modules/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js',
	'node_modules/datatables.net-keytable/js/dataTables.keyTable.min.js',
	'node_modules/datatables.net-responsive/js/dataTables.responsive.min.js',
	'node_modules/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js',
	'node_modules/datatables.net-rowgroup/js/dataTables.rowGroup.min.js',
	'node_modules/datatables.net-rowreorder/js/dataTables.rowReorder.min.js',
	'node_modules/datatables.net-scroller/js/dataTables.scroller.min.js',
	'node_modules/datatables.net-select/js/dataTables.select.min.js',
	'node_modules/jstree/dist/jstree.js',
	'node_modules/jqvmap/dist/jquery.vmap.js',
	'node_modules/jqvmap/dist/maps/jquery.vmap.world.js',
	'node_modules/jqvmap/dist/maps/jquery.vmap.russia.js',
	'node_modules/jqvmap/dist/maps/jquery.vmap.usa.js',
	'node_modules/jqvmap/dist/maps/jquery.vmap.germany.js',
	'node_modules/jqvmap/dist/maps/jquery.vmap.europe.js'
	], 'public/custom.js')

mix.styles([
	'node_modules/fullcalendar/dist/fullcalendar.css',
	'node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css',
	'node_modules/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css',
	'node_modules/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css',
	'node_modules/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css',
	'node_modules/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css',
	'node_modules/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css',
	'node_modules/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css',
	'node_modules/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css',
	'node_modules/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css',
	'node_modules/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css',
	'node_modules/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css',
	'node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css',
	'node_modules/jstree/dist/themes/default/style.css',
	'node_modules/jqvmap/dist/jqvmap.css'
	], 'public/custom.css')
