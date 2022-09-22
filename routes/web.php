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

Route::prefix('/admin')->group(function() {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])
    ->name('admin.index');
    Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'index'])
    ->name('admin.logout');

    Route::get('/books', [App\Http\Controllers\BooksController::class, 'index'])
    ->name('admin.books');
    Route::delete('/books', [App\Http\Controllers\BooksController::class, 'delete'])
    ->name('admin.books');

    Route::get('/customers', [App\Http\Controllers\CustomersController::class, 'index'])
    ->name('admin.customers');
    Route::delete('/customers', [App\Http\Controllers\CustomersController::class, 'delete'])
    ->name('admin.customers');

    Route::get('/books_rentals', [App\Http\Controllers\BooksRentalsController::class, 'index'])
    ->name('admin.booksRentals');
    Route::delete('/books_rentals', [App\Http\Controllers\BooksRentalsController::class, 'delete'])
    ->name('admin.booksRentals');

    Route::get('/libraries', [App\Http\Controllers\LibrariesController::class, 'index'])
    ->name('admin.libraries');
    Route::delete('/libraries', [App\Http\Controllers\LibrariesController::class, 'delete'])
    ->name('admin.libraries');

    Route::get('/requests_to_suppliers', [App\Http\Controllers\RequestsToSuppliersController::class, 'index'])
    ->name('admin.requestsToSuppliers');
    Route::delete('/requests_to_suppliers', [App\Http\Controllers\RequestsToSuppliersController::class, 'delete'])
    ->name('admin.requestsToSuppliers');

    Route::get('/suppliers', [App\Http\Controllers\SuppliersController::class, 'index'])
    ->name('admin.suppliers');
    Route::delete('/suppliers', [App\Http\Controllers\SuppliersController::class, 'delete'])
    ->name('admin.suppliers');
});
