<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index() {

        $books = new Books();
        $query = $books->paginate(3);

        $db_columns = DB::select('SHOW COLUMNS FROM '. 'books');
        $header = array_map(function($db_column) {
            return $db_column->Field;
        }, $db_columns);

        //$header = Schema::getColumnListing('books');
        //$header = getTableColumns('books');
        $header = array_diff($header, ['created_at', 'updated_at']);
        return view('admin', 
        [
            'query' => $query,
            'header' => $header
        ]);
    }
}
