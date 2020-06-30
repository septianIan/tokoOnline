<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    //cara pertama
    // protected function authenticated(Request $request, $user)
    // {
    //     //jika role admin
    //     if ($user->hasRole('admin')) {
    //         return \redirect()->route('admin');
    //     }
    //     //jika tidak atau user biasa
    //     return \redirect()->route('home');
    // }

    //cara kedua
    public function redirectTo()
    {
        if (auth()->user()->hasRole('admin')) {
            return '/admin';
        }

        return $this->redirectTo;
    }
}
