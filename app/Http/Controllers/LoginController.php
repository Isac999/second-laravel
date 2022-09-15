<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function verify(Request $request) {
        
        $feedback =   [
            'email' => 'O campo senha deve ter no mínimo 8 caracteres',
            'password' => 'O campo senha deve ter no mínimo 6 caracteres'
        ];

        $request->validate([
            'email' => 'required|email|min:8|unique:logins',
            'password' => 'required|min:6|max:25'
        ], $feedback);

        return 'tudo ok';
    } 
}
