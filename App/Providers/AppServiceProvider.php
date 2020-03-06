<?php

namespace App\Providers;

use App\Factory\RolesPermissionFactory\RolesPermissionFactory;
use App\Lib\ProgrammableSMS\SMSReader;
use App\Lib\Services\MailTransporter;
use App\Mail\SendMail;
use App\Model\ReportTemplate;
use App\Repo\Models\UserRepo;
use App\Services\Payment\AuthorizeNet;
use App\Services\Payment\PayableInterface;
use App\Services\Payment\Payment;
use App\Template\TemplateManager;
use App\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		$this->app->singleton(RolesPermissionFactory::class);
		$this->registerPayments();
		$this->registerServices();
		$this->sendMail();
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		View::composer('supportNew.pages.reports.modals.loadTemplate', function ($view) {
			$view->with(
				'templates',
				ReportTemplate::where('is_deleted', 0)->where('report_name', request()->route('template'))->get(['name', 'data', 'id'])
			);
		});
		Blade::directive('canAccess', function ($parameters) {
			return "<?php if(Auth::check() && Auth::user()->hasPermission($parameters)):  ?>";
		});

		Blade::directive('endcanAccess', function () {
			return '<?php endif; ?>';
		});

		Blade::directive('hasRole', function ($parameters) {
			return "<?php if(Auth::check() && Auth::user()->hasRole($parameters)): ?>";
		});

		Blade::directive('endhasRole', function () {
			return "<?php endif; ?>";
		});

		$this->app->singleton(TemplateManager::class, function () {
			return new TemplateManager();
		});

		$this->app->singleton(userRepo::class, function () {
			return new userRepo(new User);
		});

		Relation::morphMap([
			'users' => 'App\User',
            'tasks' => 'App\Model\Task',
            'projects' => 'App\Model\Project',
			'accounts' => 'App\Model\Account',
			'companies' => 'App\Model\Company',
			'members' => 'App\Model\Member',
			'company_branches' => 'App\Model\CompanyBranch',
		]);
	}

	/**
	 * Payment based getaway
	 * @params array $parameters
	 * @disclaimer do not modify this block
	 * @author Rakesh shrestha
	 * @return Payment
	 */
	public function registerPayments() {
		$this->app->bind('payment.authorizeNet', function ($app, $parameters): Payment {
			return new Payment($parameters, $this->paymentGetawayFactory(array_get($parameters, 'getaway', 'authorize.net')));
		});
	}

	/**
	 * Binding the services like mmail api twilio
	 * @params array $parameters
	 * @disclaimer do not modify this block
	 * @author Rakesh shrestha
	 */
	public function registerServices() {
		$this->app->bind('twilio.client.inbound', function ($app, $parameters): SMSReader {
			return new SMSReader(default_company('sms_sid'), default_company('sms_auth_token'));
		});
	}

	/**
	 * Factory to resolve required PaymentGetaway
	 *
	 * @param string $getaway
	 * @throws Exception
	 * @return PayableInterface
	 */
	private function paymentGetawayFactory($getaway = "authorize.net"): PayableInterface {
		if ($getaway === 'authorize.net') {
			$defaultGetaway = new AuthorizeNet();
		} else {
			throw new \Exception("The requested getaway is unavailable");
		}
		return $defaultGetaway;
	}

	public function registerGoogleServices() {
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function sendMail() {
		$this->app->bind('sendMail.mailer', function ($app, $parameters) {
			return new MailTransporter($parameters, new SendMail(
				array_get($parameters, 'subject'), array_get($parameters, 'content_message'), array_get($parameters, 'id'), array_get($parameters, 'pdf')));
		});

	}

}
