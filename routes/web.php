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

Route::prefix('/app')->group(function() {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])
    ->name('app.index');
    Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'index'])
    ->name('app.logout');
});
