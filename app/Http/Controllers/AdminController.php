<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use Illuminate\Support\Facades\Schema;

class AdminController extends Controller
{
    public function index() {
        $books = new Books();
        $query = $books->all();
        //dd($query);
        $header = Schema::getColumnListing('books');
        return view('admin', 
        [
            'query' => $query,
            'header' => $header
        ]);
    }
}
