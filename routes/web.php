<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\LoginController::class, 'login'])
->name('login.index');
Route::post('/', [App\Http\Controllers\LoginController::class, 'verify'])
->name('login.index');
Route::get('/register', [App\Http\Controllers\LoginController::class, 'register'])
->name('login.register');
