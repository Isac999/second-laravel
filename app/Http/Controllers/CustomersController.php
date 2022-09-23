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

    public function delete(Request $request) {
        $target = $request->id;
        
        if ($target != null) {
            $customers = new Customers();
            $query = $customers->find($target)->delete();
        }
    }

    public function insert(Request $request) {
        $customers = new Customers();

        foreach ($request->listData as $item) {
            $column = $item[0];
            $value = $item[1];
            $customers->$column = $value;            
        }
        $customers->save();
    }
}
