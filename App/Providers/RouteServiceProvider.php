<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Symfony\Component\HttpKernel\DependencyInjection\ServicesResetter;

class RouteServiceProvider extends ServiceProvider
{
     /**
      * This namespace is applied to your controller routes.
      *
      * In addition, it is set as the URL generator's root namespace.
      *
      * @var string
      */
     protected $namespace = 'App\Http\Controllers';

     /**
      * Define your route model bindings, pattern filters, etc.
      *
      * @return void
      */
     public function boot()
     {
          //

          parent::boot();
     }

     /**
      * Define the routes for the application.
      *
      * @return void
      */
     public function map()
     {
          $this->mapApiRoutes();

          $this->mapWebRoutes();

          //
     }

     /**
      * Define the "web" routes for the application.
      *
      * These routes all receive session state, CSRF protection, etc.
      *
      * @return void
      */
     protected function mapWebRoutes()
     {
          Route::middleware('web')
               ->namespace($this->namespace)
               ->group(base_path('routes/web.php'));

          Route::middleware('web')
               ->namespace($this->namespace)
               ->group(base_path('routes/support_route.php'));

          Route::middleware('web')
               ->namespace($this->namespace)
               ->group(base_path('routes/route_templates.php'));

          // CMS Route
          Route::middleware('web')
               ->namespace($this->namespace . '\CMS')
               ->group(base_path('routes/route_cms.php'));

          //User/Member route map  
          Route::middleware('web')
               ->namespace($this->namespace . '\User')
               ->group(base_path('routes/member_route.php'));

          // Roles and Permission Routes
          Route::middleware('web')
               ->namespace($this->namespace . '\RolesAndPermissions')
               ->group(base_path('routes/roles_permission_route.php'));

          // Projects Routes
          Route::middleware('web')
               ->namespace($this->namespace . '\Projects')
               ->group(base_path('routes/projects_route.php'));

          // SiteSetting
          Route::middleware('web')
               ->namespace($this->namespace . '\SiteSetting')
               ->group(base_path('routes/route_site_setting.php'));

          //Lookup
          Route::middleware('web')
               ->namespace($this->namespace . '\LookUp')
               ->group(base_path('routes/route_lookup.php'));
          //PreferredTime
          Route::middleware('web')
               ->namespace($this->namespace . '\PreferredTime')
               ->group(base_path('routes/route_preferred_time.php'));
          //Extras
          Route::middleware('web')
               ->namespace($this->namespace . '\extras')
               ->group(base_path('routes/route_extras.php'));

          // //Export
          Route::middleware('web')
               ->namespace($this->namespace . '\Export')
               ->group(base_path('routes/route_export.php'));
          // Userlogs
          Route::middleware('web')
               ->namespace($this->namespace . '\User')
               ->group(base_path('routes/route_userlog.php'));
          // Default Company
          Route::middleware('web')
               ->namespace($this->namespace . '\defaultCompany')
               ->group(base_path('routes/route_defaultCompany.php'));
          // Validation
          Route::middleware('web')
               ->namespace($this->namespace . '\Validation')
               ->group(base_path('routes/validation_route.php'));

          // Notes
          Route::middleware('web')
               ->namespace($this->namespace . '\Notes')
               ->group(base_path('routes/route_notes.php'));

          //Blogs
          Route::middleware('web')
               ->namespace($this->namespace . '\Blog')
               ->group(base_path('routes/route_blogs.php'));

          // Client
          Route::middleware('web')
               ->namespace($this->namespace . '\Client')
               ->group(base_path('routes/route_client.php'));

          // Zip
          Route::middleware('web')
               ->namespace($this->namespace . '\Location')
               ->group(base_path('routes/route_zip.php'));

          Route::middleware('web')
               ->namespace($this->namespace . '\Account')
               ->group(base_path('routes/route_account.php'));
          Route::middleware('web')
               ->namespace($this->namespace . '\Product')
               ->group(base_path('routes/route_product.php'));
          Route::middleware('web')
               ->namespace($this->namespace . '\Inventory')
               ->group(base_path('routes/route_inventory.php'));
          Route::middleware('web')
               ->namespace($this->namespace . '\Package')
               ->group(base_path('routes/route_package.php'));
          Route::middleware('web')
               ->namespace($this->namespace . '\Mail')
               ->group(base_path('routes/route_mail.php'));
          Route::middleware('web')
               ->namespace($this->namespace . '\Address')
               ->group(base_path('routes/route_address.php'));

          Route::middleware('web')
               ->namespace($this->namespace . '\Calendar')
               ->group(base_path('routes/route_calendar.php'));
          // Coupons
          Route::middleware('web')
               ->namespace($this->namespace . '\Coupon')
               ->group(base_path('routes/route_coupon.php'));
          // content
          Route::middleware('web')
               ->namespace($this->namespace . '\Content')
               ->group(base_path('routes/route_content.php'));
          // payment
          Route::middleware('web')
               ->namespace($this->namespace . '\Payment')
               ->group(base_path('routes/route_payment.php'));
          // import
          Route::middleware('web')
               ->namespace($this->namespace . '\Importer')
               ->group(base_path('routes/route_importer.php'));
          // Purchase Orders
          Route::middleware('web')
               ->namespace($this->namespace . '\PurchaseOrder')
               ->group(base_path('routes/route_purchase_order.php'));
          Route::middleware('web')
               ->namespace($this->namespace . '\Order')
               ->group(base_path('routes/route_order.php'));
          // Quotes
          Route::middleware('web')
               ->namespace($this->namespace . '\Quote')
               ->group(base_path('routes/route_quote.php'));
          // Bills
          Route::middleware('web')
               ->namespace($this->namespace . '\Bills')
               ->group(base_path('routes/route_bills.php'));
          // Account Heads
          Route::middleware('web')
               ->namespace($this->namespace . '\AccountHead')
               ->group(base_path('routes/route_accounthead.php'));
          // Bank Master/ Cash Master
          Route::middleware('web')
               ->namespace($this->namespace . '\Banking')
               ->group(base_path('routes/route_banking.php'));
          // Tax Master
          Route::middleware('web')
               ->namespace($this->namespace . '\Taxmaster')
               ->group(base_path('routes/route_taxmaster.php'));
          // Layout Builder 
          Route::middleware('web')
               ->namespace($this->namespace . '\Layout')
               ->group(base_path('routes/route_layout.php'));


          // Admin Dashboard
          Route::middleware('web')
               ->namespace($this->namespace . '\Dashboard')
               ->group(base_path('routes/route_dashboard.php'));

          // Communication Preferences Builder 
          Route::middleware('web')
               ->namespace($this->namespace . '\communicationPreference')
               ->group(base_path('routes/route_communication_preference.php'));

          // Campaign(list) 
          Route::middleware('web')
               ->namespace($this->namespace . '\Campaign')
               ->group(base_path('routes/route_campaign.php'));
          // Enquiry
          Route::middleware('web')
               ->namespace($this->namespace . '\Enquiry')
               ->group(base_path('routes/route_enquiry.php'));
          // Taskboard
          Route::middleware('web')
               ->namespace($this->namespace . '\Taskboard')
               ->group(base_path('routes/route_taskboard.php'));
          Route::middleware('web')
               ->namespace($this->namespace . '\TaskboardList')
               ->group(base_path('routes/route_taskboard_list.php'));
          Route::middleware('web')
               ->namespace($this->namespace . '\TaskboardCard')
               ->group(base_path('routes/route_taskboard_card.php'));
          Route::middleware('web')
               ->namespace($this->namespace . '\Task')
               ->group(base_path('routes/route_tasks.php'));
          Route::middleware('web')
               ->namespace($this->namespace . '\Project')
               ->group(base_path('routes/route_project.php'));

          // Journal
          Route::middleware('web')
               ->namespace($this->namespace . '\Journal')
               ->group(base_path('routes/route_journal.php'));

          // Opening Balance
          Route::middleware('web')
               ->namespace($this->namespace . '\Openingbalance')
               ->group(base_path('routes/route_openingbalance.php'));
          // Ledger
          Route::middleware('web')
               ->namespace($this->namespace . '\Ledger')
               ->group(base_path('routes/route_ledger.php'));
          // // Netlify Template
          // Route::middleware('web')
          //      ->namespace($this->namespace . '\Netlify')
          //      ->group(base_path('routes/Netlify/route_netlify.php'));

          // Route::middleware('web')
          //      ->namespace($this->namespace . '\Netlify\About')
          //      ->group(base_path('routes/Netlify/route_about.php'));

          // // Pricing
          // Route::middleware('web')
          //      ->namespace($this->namespace . '\Netlify\Pricing')
          //      ->group(base_path('routes/Netlify/route_pricing.php'));
          // // Career
          // Route::middleware('web')
          //      ->namespace($this->namespace . '\Netlify\Career')
          //      ->group(base_path('routes/Netlify/route_career.php'));
          // // SingleCareer
          // Route::middleware('web')
          //      ->namespace($this->namespace . '\Netlify\SingleCareer')
          //      ->group(base_path('routes/Netlify/route_single_career.php'));
          // // singleTeam
          // Route::middleware('web')
          //      ->namespace($this->namespace . '\Netlify\SingleTeam')
          //      ->group(base_path('routes/Netlify/route_single_team.php'));
          // // Services
          // Route::middleware('web')
          //      ->namespace($this->namespace . '\Netlify\Services')
          //      ->group(base_path('routes/Netlify/route_service.php'));
          // // Portfolio
          // Route::middleware('web')
          //      ->namespace($this->namespace . '\Netlify\Portfolio')
          //      ->group(base_path('routes/Netlify/route_portfolio.php'));
          // // Blog
          // Route::middleware('web')
          //      ->namespace($this->namespace . '\Netlify\Blog')
          //      ->group(base_path('routes/Netlify/route_blog.php'));
          // // Contact
          // Route::middleware('web')
          //      ->namespace($this->namespace . '\Netlify\Contact')
          //      ->group(base_path('routes/Netlify/route_contact.php'));

          Route::middleware('web')
               ->namespace($this->namespace . '\\Report')
               ->group(base_path('routes/route_reports.php'));


          Route::middleware('web')
               ->namespace($this->namespace . '\\Template')
               ->group(base_path('routes/route_email_template.php'));
               
          // Faq
          Route::middleware('web')
               ->namespace($this->namespace . '\Faq')
               ->group(base_path('routes/route_faq.php'));
     }

     /**
      * Define the "api" routes for the application.
      *
      * These routes are typically stateless.
      *
      * @return void
      */
     protected function mapApiRoutes()
     {
          Route::prefix('api')
               ->middleware('api')
               ->namespace($this->namespace)
               ->group(base_path('routes/api.php'));
          Route::prefix('api')
               ->middleware('api')
               ->namespace($this->namespace . '\\Calendar')
               ->group(base_path('routes/crates_on_skates/Api/calendar_api.php'));
     }
}
