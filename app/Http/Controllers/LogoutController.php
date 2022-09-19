<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function index() {
        if(session_start()) {
            session_destroy();
        }
        return redirect()->route('login.index');
    }
}
