const mix = require("laravel-mix");
let supportNew = require("./supportNew.mix");
let netlifyMix = require("./netlify.mix");
let cratesonskates = require("./cratesOnSkates.mix");
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

mix.js("resources/js/app.js", "public/js").sass(
    "resources/sass/app.scss",
    "public/css"
);

mix.js([
    "resources/js/modern_js/events",
    "resources/js/modern_js/masks",
    "resources/js/modern_js/signature",
], "public/js/babel.js");


mix.sass(
    "resources/assets/cratesOnSkates/custom/sass/default.scss",
    "public/cratesoskates/css/sass.css"
).options({ processCssUrls: false });

mix.sass(
    "resources/assets/supportNew/sass/backend-default.scss",
    "public/supportNew/css/sass.css"
).options({ processCssUrls: false });
// );

// // demo 7 bulndle

mix.scripts(
    [
        "node_modules/clientjs/dist/client.min.js",
        "resources/assets/vendors/global/vendors.bundle.js",
        "resources/assets/js/demo1/scripts.bundle.js",
        "resources/assets/js/demo1/pages/login/login-general.js",
        "resources/js/custom/register.js",
        "resources/js/custom/login.js",
        "resources/js/custom/reset.js"
    ],
    "public/js/all.js"
);

mix.styles(
    [
        "resources/assets/css/demo1/pages/general/login/login-3.css",
        "resources/assets/vendors/global/vendors.bundle.css",
        "resources/assets/css/demo1/style.bundle.css",
        "resources/assets/css/demo1/skins/header/base/light.css",
        "resources/assets/css/demo1/skins/header/menu/light.css",
        "resources/assets/css/demo1/skins/brand/dark.css",
        "resources/assets/css/demo1/skins/aside/dark.css",
        "resources/assets/custom/css/projects.css"
    ],
    "public/css/all.css"
);

mix.scripts(
    [
        "resources/assets/vendors/global/vendors.bundle.js",
        "resources/assets/js/demo8/scripts.bundle.js",
        "resources/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js",
        "resources/assets/js/demo1/pages/crud/forms/widgets/select2.js",
        // 'resources/assets/vendors/bootstrap/bootstrap-select.js',
        "resources/assets/vendors/custom/gmaps/gmaps.js",
        "resources/assets/js/demo8/pages/dashboard.js",
        "resources/js/custom/register.js",
        "resources/js/custom/login.js",
        "resources/js/custom/reset.js",
        "resources/js/custom/page.js",
        "resources/js/custom/form.js",
        "resources/js/custom/modal.js",
        "resources/js/custom/sweet.js",
        "resources/js/custom/audit.js",
        "resources/js/custom/element.js",
        "resources/js/custom/main_load.js",
        "resources/assets/custom/js/roles_permission.js",
        "resources/assets/custom/js/page_load.js",
        "resources/assets/custom/js/load_tab.js",
        "resources/js/custom/dashboard.js",
        "resources/assets/custom/js/custom_ajax.js",
        "resources/assets/custom/js/support_modal.js",
        "resources/assets/custom/js/delete_confirmation.js",
        "resources/assets/custom/js/user_control.js",
        "resources/assets/custom/js/delete_confirmation.js",
        "resources/assets/custom/js/user_profile.js",
        "resources/assets/custom/js/custom_error.js",
        "resources/assets/custom/js/personal_info.js",
        "resources/assets/custom/js/custom_lookup.js",
        "resources/assets/custom/js/membership.js",
        "resources/assets/custom/js/validation.js",
        "resources/assets/custom/js/validation_section_table.js",
        "resources/assets/custom/js/icon.js",
        "resources/assets/custom/js/custom_note.js",
    ],
    "public/js/dashboard.js"
);

mix.styles(
    [
        "resources/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css",
        "resources/assets/vendors/global/vendors.bundle.css",
        "resources/assets/css/demo8/style.bundle.css",
        // 'resources/assets/vendors/bootstrap/bootstrap-select.css',
        "public/css/pageloader.css",
        "resources/assets/custom/css/projects.css",
        "resources/assets/custom/css/rolesAndPermissions.css",
        "resources/assets/custom/css/support_modal.css",
        "resources/assets/custom/css/user_control.css",
        "resources/assets/custom/css/usersControl.css",
        "resources/assets/custom/css/profile_overview.css",
        "resources/assets/custom/css/personal_info.css",
        "resources/assets/custom/css/membership.css",
        "resources/assets/custom/css/site_setting.css",
        "resources/assets/custom/css/lookUp.css",
        "resources/assets/custom/css/defaultCompany.css",
        "resources/assets/custom/css/validation.css",
        "resources/assets/custom/css/custom_notes.css",
        "resources/assets/custom/css/menu.css",
        "resources/assets/custom/css/icon.css",
        "resources/assets/custom/css/blog.css",
        "resources/assets/custom/css/template.css",
        "resources/assets/custom/css/user_logs.css"
    ],
    "public/css/dashboard.css"
);

// /*=======Mix for Support New ===================*/
mix.styles(supportNew.styles, "public/supportNew/css/all.css");
mix.scripts(supportNew.scripts, "public/supportNew/js/all.js");

// /*=======Mix for Netlify ===================*/
mix.styles(netlifyMix.styles, "public/netlify/css/all.css");
mix.scripts(netlifyMix.scripts, "public/netlify/js/all.js");

/*=======Mix for Crates On Skates ===================*/
mix.styles(cratesonskates.styles, "public/cratesoskates/css/all.css");
mix.scripts(cratesonskates.scripts, "public/cratesoskates/js/all.js");