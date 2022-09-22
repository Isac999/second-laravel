<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use Illuminate\Support\Facades\Schema;

class BooksController extends Controller
{
    public function index() {

        $books = new Books();
        $query = $books->paginate(3);

        $header = Schema::getColumnListing('books');
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
}
