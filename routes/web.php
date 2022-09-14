<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\LoginController::class, 'index'])
->name('login.index');
Route::post('/', [App\Http\Controllers\LoginController::class, 'verify'])
->name('login.index');

Route::get('/register', [App\Http\Controllers\RegisterController::class, 'index'])
->name('register.index');
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'createNewAccount'])
->name('register.index');