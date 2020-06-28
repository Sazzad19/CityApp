<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $email = $request['email'];
        $password = $request['password'];
        //$credentials = $request->only('email', 'password');

        if (Auth::attempt(['email' => $email, 'password' => $password, 'isAdmin' => 1])) {
            // Authentication passed...
            return redirect()->intended('/');
        }
        else{
            return redirect()->back();
        }
    }
}
