<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
  /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

  use AuthenticatesUsers;

  /**
   * Where to redirect users after login.
   *
   * @var string
   */
  protected $redirectTo = '/admin';

  /**
   * Login username
   *
   * @var string
   */
  protected $username;
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
    // $this->username = $this->findUsername();
  }

  /**
   * Attempt the login process
   *
   * @return user guard
   */
  protected function attemptLogin(Request $request)
  {
    $this->validateLoginReq($request);
    $user = new \App\User;

    // return $this->authenticated($request, $user);

    if (!$user->where('email', $request->email)->first()) {
      if (!$user->where('username', $request->email)->first()) {
        \Response::json(['errors' => ['user' => 'User doesn\'t exist']], 422)->send();
        exit();
      }
      $user = $user->where('username', $request->email)->first();
    } else {
      $user = $user->where('email', $request->email)->first();
    }
    if (!Hash::check($request->password, $user->password)) {
      \Response::json(['errors' => ['password' => 'Password incorrect!']], 422)->send();
      exit();
    }
    // if ($user->is_locked == 1) {
    //     \Response::json(['errors' => ['email' => 'Email not verified yet!']], 422)->send();
    //     exit();
    // }

    return $this->guard()->attempt(
      $this->credentials($request),
      $request->filled('remember')
    );
  }
  /**
   * Log the user out of the application.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function logout(Request $request)
  {
    $this->guard()->logout();

    $request->session()->invalidate();

    return $this->loggedOut($request) ?: redirect($request->input('redirect') ?: '/');
  }
  /**
   * Validate the login request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return Void
   */

  public function validateLoginReq(Request $request)
  {
    $this->validate($request, [
      'email' => 'required|email'
    ]);
  }

  /**
   * The user has been authenticated.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  mixed  $user
   * @return mixed
   */
  protected function authenticated(Request $request, $user)
  {
    $role_permissions = $user->roles()->with([
      'permissions' => function($permissions) {
        $permissions->select('permissions.id', 'action');
      },
      'permissions.pages' => function($pages) {
        $pages->select('pages.id', 'page_name', 'action');
      }
    ])->get(['roles.id'])->pluck('permissions')->collapse()->each(function($permission) {
      $permission->page = $permission->pages->pluck('page_name')->all();
      unset($permission->pages, $permission->pivot);
    });

    $permissions = $user->permissions()->select('permissions.id', 'action')->with([
      'pages' => function($pages) {
        $pages->select('pages.id', 'page_name', 'action');
      }
    ])->get()->each(function($permission) {
      $permission->page = $permission->pages->pluck('page_name')->all();
      unset($permission->pages, $permission->pivot);
    })->merge($role_permissions)->toArray();

    session(['permissions' => $permissions]);
  }
}
