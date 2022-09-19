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
    Route::get('/admin/books', [App\Http\Controllers\BooksController::class, 'index'])
    ->name('app.index');
    Route::get('/admin/customers', [App\Http\Controllers\CustomersController::class, 'index'])
    ->name('app.index');
    Route::get('/admin/books_rentals', [App\Http\Controllers\BooksRentalsController::class, 'index'])
    ->name('app.index');
    Route::get('/admin/libraries', [App\Http\Controllers\LibrariesController::class, 'index'])
    ->name('app.index');
    Route::get('/admin/requests_to_suppliers', [App\Http\Controllers\RequestsToSuppliersController::class, 'index'])
    ->name('app.index');
    Route::get('/admin/suppliers', [App\Http\Controllers\SuppliersController::class, 'index'])
    ->name('app.index');
});
