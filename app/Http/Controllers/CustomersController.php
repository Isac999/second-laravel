<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Schema;

class CustomersController extends Controller
{
    public function index() {
        
        $books = new Customers();
        $query = $books->paginate(3);
        //dd($query);
        $header = Schema::getColumnListing('customers');
        $header = array_diff($header, ['created_at', 'updated_at']);

        return view('admin', 
        [
            'query' => $query,
            'header' => $header
        ]);
    }
}
