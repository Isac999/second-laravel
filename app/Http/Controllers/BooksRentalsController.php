<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BooksRentals;
use Illuminate\Support\Facades\Schema;

class BooksRentalsController extends Controller
{
    public function index() {
        
        $books = new BooksRentals();
        $query = $books->paginate(3);
        //dd($query);
        $header = Schema::getColumnListing('books_rentals');
        $header = array_diff($header, ['created_at', 'updated_at']);

        return view('admin', 
        [
            'query' => $query,
            'header' => $header
        ]);
    }
}
