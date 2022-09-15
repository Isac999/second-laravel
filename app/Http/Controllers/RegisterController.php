<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;

class RegisterController extends Controller
{
    public function index() {
        return view('register');
    }

    public function createNewAccount(Request $request) {

        $feedback = [
            'email' => 'Você não pode usar o mesmo email 2 vezes (mínimo 8 caracteres)',
            'password' => 'O campo senha deve ter no mínimo 6 caracteres',
            'confirm-password' => 'As senhas não são iguais!'
        ];

        $request->validate([
            'email' => 'required|email|min:8|unique:logins',
            'password' => 'required|min:6|max:25',
            'confirm-password' => 'required_with:password|same:password|min:6|max:25'
        ], $feedback);

        $new = new Login();
        $new->email = $request->input('email');
        $new->password = $request->input('password');
        $new->save();

        return redirect()->route('login.index');
    }

}
