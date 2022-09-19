<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suppliers;
use Illuminate\Support\Facades\Schema;

class SuppliersController extends Controller
{
    public function index() {
        
        $books = new Suppliers();
        $query = $books->paginate(3);
        //dd($query);
        $header = Schema::getColumnListing('suppliers');
        $header = array_diff($header, ['created_at', 'updated_at']);

        return view('admin', 
        [
            'query' => $query,
            'header' => $header
        ]);
    }
}
