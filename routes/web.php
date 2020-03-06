<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Lib\ProgrammableSMS\SMSReader;
use App\Model\audit;
use App\Model\UserLog;
use App\Model\Lookup\Lookup;
use App\Model\CMS\CmsComponent;
use App\Services\GoogleCalendar\GoogleCalendar;
use Illuminate\Support\Facades\Log;

Route::get('/fetch/replies', function(){
  $replies = new SMSReader(default_company('sms_sid'), default_company('sms_auth_token'));
  dd($replies->getReplies('+977'));
});

Route::get('test/cal','Calendar\CalendarController@google');

Route::get('calendar/store', 'Calendar\CalendarController@storeToCalendar');

Route::get('/tester',function(){
    return response()->json(["test" => "est"]);
});
Route::get('admin/login', function () {
    return view('support.login');
});

Route::post('cal/hook', function(){
  Log::error("hooked");
  dd("test");
});

// Authentication Routes...
Route::get('/admin/login', [
  'as' => 'login',
  'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login', [
  'as' => '',
  'uses' => 'Auth\LoginController@login'
]);
Route::post('logout', [
  'as' => 'logout',
  'uses' => 'Auth\LoginController@logout'
]);

// Password Reset Routes...
Route::post('password/email', [
  'as' => 'password.email',
  'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('password/reset', [
  'as' => 'password.request',
  'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('password/reset', [
  'as' => 'password.update',
  'uses' => 'Auth\ResetPasswordController@reset'
]);
Route::get('password/reset/{token}', [
  'as' => 'password.reset',
  'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

// Registration Routes...
Route::get('admin/register', [
  'as' => 'register',
  'uses' => 'Auth\RegisterController@showRegistrationForm'
]);
Route::post('register', [
  'as' => '',
  'uses' => 'Auth\RegisterController@register'
])->middleware(['cleanMasked']);
// Verify Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', function () {
    $component = CmsComponent::where('is_deleted', 0)->where('name', 'about area')->get();
    return $component;
});
Route::get('/getname', function () {
    // $a = readdir(opendir('app/resources/views'));
    // $a = scandir(base_path('resources\views\frontend\netlify\components'));
    // return $a;
    $file = file_get_contents(base_path('resources\views\frontend\netlify\components\biography.blade.php'), true);
    // $file = str_getcsv($file);
    $a = explode('##', $file);
    // if ($a[1] === 'image') return 'true';
    return $a;
    // $files = readdir($a);
    // dd(base_path('app\resources\views'));
    // print_r($a);
    // dd('test');
});

Route::get('active', function () {
    $path = \Request::path();
    return $path;
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/c404', 'HomeController@c404');
Route::get('/admin/comingsoon', 'HomeController@construction');

Route::get('/test/mail', 'Test\TestController@mail');

