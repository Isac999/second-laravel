<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\LoginController::class, 'login'])
->name('login.index');
Route::post('/', [App\Http\Controllers\LoginController::class, 'verificacao'])
->name('login.index');

