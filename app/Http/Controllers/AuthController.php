<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    //
      /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status'=>'Active'])) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
    }
}
