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

    public function delete(Request $request) {
        $target = $request->id;
        
        if ($target != null) {
            $booksRentals = new BooksRentals();
            $query = $booksRentals->find($target)->delete();
        }
    }

    public function insert(Request $request) {
        $booksRentals = new BooksRentals();

        foreach ($request->listData as $item) {
            $column = $item[0];
            $value = $item[1];
            $booksRentals->$column = $value;            
        }
        $booksRentals->save();
    }
}
