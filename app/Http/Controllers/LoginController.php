<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function verify(Request $request) {
        
        $feedback = [
            'email' => 'O campo email deve ter no mínimo 8 caracteres',
            'password' => 'O campo senha deve ter no mínimo 6 caracteres'
        ];

        $request->validate([
            'email' => 'required|email|min:8',
            'password' => 'required|min:6|max:25'
        ], $feedback);

        $email = $request->input('email');
        $password = $request->input('password');

        $instance = new Login();
        $verify = $instance->where('email', $email)->where('password', $password)->get()->first();
        
        if (isset($verify->email)) {
            session_start();
            $_SESSION['email'] = $verify->email;
            return redirect()->route('app.index');
        } else {
            return redirect()->route('login.index');
        }
    } 
}
