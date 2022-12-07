import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                
                // favicon
                // 'resources/images/favicon.ico',
                // Loader
                'resources/scss/layouts/vertical-light-menu/light/loader.scss',
                'resources/layouts/vertical-light-menu/loader.js',

                // Structure
                'resources/scss/layouts/vertical-light-menu/light/structure.scss',
                'resources/scss/layouts/vertical-light-menu/dark/structure.scss',

                // Main
                'resources/scss/light/assets/main.scss',
                'resources/scss/dark/assets/main.scss',

                // Secondary Files
                'resources/scss/light/assets/scrollspyNav.scss',
                'resources/scss/light/assets/pages/error/error.scss',
                'resources/scss/light/assets/custom.scss',

                'resources/scss/dark/assets/scrollspyNav.scss',
                'resources/scss/dark/assets/pages/error/error.scss',
                'resources/scss/dark/assets/custom.scss',

                // Assets Files
                // Login page
                'resources/scss/light/assets/authentication/auth-boxed.scss',
                'resources/scss/dark/assets/authentication/auth-boxed.scss',

                                /**
                 * =======================
                 *      Plugins Files
                 * =======================
                 */

                // Importing All the Plugin Custom SCSS File ( plugins.min.scss contains all the custom SCSS/CSS. )
                // 'resources/scss/light/plugins/plugins.min.scss',

                /**
                 * Light
                 */
                
                 'resources/scss/light/plugins/apex/custom-apexcharts.scss',
                 'resources/scss/light/plugins/autocomplete/css/custom-autoComplete.scss',
                 'resources/scss/light/plugins/bootstrap-range-Slider/bootstrap-slider.scss',
                 'resources/scss/light/plugins/bootstrap-touchspin/custom-jquery.bootstrap-touchspin.min.scss',
                 'resources/scss/light/plugins/clipboard/custom-clipboard.scss',
                 'resources/scss/light/plugins/drag-and-drop/dragula/example.scss',
                 'resources/scss/light/plugins/editors/markdown/simplemde.min.scss',
                 'resources/scss/light/plugins/editors/quill/quill.snow.scss',
                 'resources/scss/light/plugins/filepond/custom-filepond.scss',
                 'resources/scss/light/plugins/flatpickr/custom-flatpickr.scss',
                 'resources/scss/light/plugins/fullcalendar/custom-fullcalendar.scss',
                 'resources/scss/light/plugins/loaders/custom-loader.scss',
                 'resources/scss/light/plugins/notification/snackbar/custom-snackbar.scss',
                 'resources/scss/light/plugins/noUiSlider/custom-nouiSlider.scss',
                 'resources/scss/light/plugins/perfect-scrollbar/perfect-scrollbar.scss',
                 'resources/scss/light/plugins/pricing-table/css/component.scss',
                 'resources/scss/light/plugins/splide/custom-splide.min.scss',
                 'resources/scss/light/plugins/stepper/custom-bsStepper.scss',
                 'resources/scss/light/plugins/sweetalerts2/custom-sweetalert.scss',
                 'resources/scss/light/plugins/table/datatable/dt-global_style.scss',
                 'resources/scss/light/plugins/table/datatable/custom_dt_custom.scss',
                 'resources/scss/light/plugins/table/datatable/custom_dt_miscellaneous.scss',
                 'resources/scss/light/plugins/tagify/custom-tagify.scss',
                 'resources/scss/light/plugins/tomSelect/custom-tomSelect.scss',
 
                 /**
                  * Dark
                  */
 
                 'resources/scss/dark/plugins/apex/custom-apexcharts.scss',
                 'resources/scss/dark/plugins/autocomplete/css/custom-autoComplete.scss',
                 'resources/scss/dark/plugins/bootstrap-range-Slider/bootstrap-slider.scss',
                 'resources/scss/dark/plugins/bootstrap-touchspin/custom-jquery.bootstrap-touchspin.min.scss',
                 'resources/scss/dark/plugins/clipboard/custom-clipboard.scss',
                 'resources/scss/dark/plugins/drag-and-drop/dragula/example.scss',
                 'resources/scss/dark/plugins/editors/markdown/simplemde.min.scss',
                 'resources/scss/dark/plugins/editors/quill/quill.snow.scss',
                 'resources/scss/dark/plugins/filepond/custom-filepond.scss',
                 'resources/scss/dark/plugins/flatpickr/custom-flatpickr.scss',
                 'resources/scss/dark/plugins/fullcalendar/custom-fullcalendar.scss',
                 'resources/scss/dark/plugins/loaders/custom-loader.scss',
                 'resources/scss/dark/plugins/notification/snackbar/custom-snackbar.scss',
                 'resources/scss/dark/plugins/noUiSlider/custom-nouiSlider.scss',
                 'resources/scss/dark/plugins/perfect-scrollbar/perfect-scrollbar.scss',
                 'resources/scss/dark/plugins/pricing-table/css/component.scss',
                 'resources/scss/dark/plugins/splide/custom-splide.min.scss',
                 'resources/scss/dark/plugins/stepper/custom-bsStepper.scss',
                 'resources/scss/dark/plugins/sweetalerts2/custom-sweetalert.scss',
                 'resources/scss/dark/plugins/table/datatable/dt-global_style.scss',
                 'resources/scss/dark/plugins/table/datatable/custom_dt_custom.scss',
                 'resources/scss/dark/plugins/table/datatable/custom_dt_miscellaneous.scss',
                 'resources/scss/dark/plugins/tagify/custom-tagify.scss',
                 'resources/scss/dark/plugins/tomSelect/custom-tomSelect.scss',
 
                 'resources/layouts/vertical-light-menu/app.js',
 
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});
