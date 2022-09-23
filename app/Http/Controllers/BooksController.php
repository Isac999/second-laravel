<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    public function index() {

        $books = new Books();
        $query = $books->paginate(3);

        //$header = Schema::getColumnListing('books');
        $db_columns = DB::select('SHOW COLUMNS FROM '. 'books');
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
            $books = new Books();
            $query = $books->find($target)->delete();
        }
    }

    public function insert(Request $request) {
        $books = new Books();

        foreach ($request->listData as $item) {
            $column = $item[0];
            $value = $item[1];
            $books->$column = $value;            
        }
        $books->save();
    }
}
