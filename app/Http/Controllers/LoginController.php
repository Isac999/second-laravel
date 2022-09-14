<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login() {
        return view('login');
    }

    public function verify(Request $request) {
        /*
        $request->validate([
            'email' => 'required|email|min:8|unique:logins',
            'password' => 'required|min:6|max:25'
        ]);
        */
        return 'tudo ok';
    }

    public function register() {
        return view('register');
    }
}
