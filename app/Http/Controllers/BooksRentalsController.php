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
        $query = $books->paginate(15);

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
            $query = BooksRentals::findOrFail($target)->delete();
        }
    }

    public function insert(Request $request) {
        $list = [];

        foreach ($request->listData as $item) {

            list($column, $value) = $item;
            $list[$column] = $value;
        }
        
        BooksRentals::create($list);
    }

    public function update(Request $request) {
        $target = BooksRentals::findOrFail($request->listData[0]);

        $target->book_id = $request->listData[1];
        $target->customer_id = $request->listData[2];
        $target->date = $request->listData[3];

        $target->save();
    }
}
