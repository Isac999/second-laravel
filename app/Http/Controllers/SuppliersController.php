<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suppliers;
use Illuminate\Support\Facades\Schema;

class SuppliersController extends Controller
{
    public function index() {
        
        $suppliers = new Suppliers();
        $query = $suppliers->paginate(3);
        //dd($query);
        $header = Schema::getColumnListing('suppliers');
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
            $suppliers = new Suppliers();
            $query = $suppliers->find($target)->delete();
        }
    }

    public function insert(Request $request) {
        $suppliers = new Suppliers();

        foreach ($request->listData as $item) {
            $column = $item[0];
            $value = $item[1];
            $suppliers->$column = $value;            
        }
        $suppliers->save();
    }
}
