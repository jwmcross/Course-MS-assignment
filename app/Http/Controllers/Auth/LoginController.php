<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Carbon;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /*
     * Returns the login username used by the controller
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Updates the user with the timestamp of when they logged in.
     *
     * @param Request $request
     * @param User $user
     *
     */
    public function authenticated( Request $request, $user)
    {
        $request->session()->put('last_login', $user->last_login_datetime);
        $user->last_login_datetime = Carbon::now();
        $user->save();
    }
}
