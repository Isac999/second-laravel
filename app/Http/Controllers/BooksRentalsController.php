<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BooksRentals;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class BooksRentalsController extends Controller
{
    public function index() {
        
        $books = new BooksRentals();
        $query = $books->paginate(3);

        //$header = Schema::getColumnListing('books_rentals');
        $db_columns = DB::select('SHOW COLUMNS FROM '. 'books_rentals');
        $header = array_map(function($db_column) {
            return $db_column->Field;
        }, $db_columns);

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
