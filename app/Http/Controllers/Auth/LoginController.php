<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use http\Env\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }

    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
    }

    //guard
    protected function guard()
    {
        return Auth::guard('user');
    }

    //ログイン画面
    //user ver
    public function showLoginForm()
    {
//        return view('auth.login');
        return view('login');
    }

//    //ログアウト
//    public function logout(Request $request){
//        Auth::guard('user')->logout();
//        return $this->loggedOut($request);
//    }
//
//    //ログアウト後のリダイレクト
//    public function loggedOut(\Illuminate\Http\Request $request)
//    {
//        return redirect(route('logout'));
//    }
}
