<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    /* Ovveride the attemptLogin Function  */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            ['email' => $request->email, 'password' =>  $request->password, 'status' => 'Active']
        );
    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   // protected $redirectTo = '/admin-home';
   public function redirectTo()
   {
       if (auth()->user()->role == 'Admin') {
           return '/admin-home';
       } else if (auth()->user()->role == 'User') {
           return '/home';
       } 
   }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
