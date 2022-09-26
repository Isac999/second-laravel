<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
{
    public function index() {
        
        $books = new Customers();
        $query = $books->paginate(3);
        //dd($query);
        //$header = Schema::getColumnListing('customers');
        $db_columns = DB::select('SHOW COLUMNS FROM '. 'customers');
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

    public function update(Request $request) {
        $customers = new Customers();
        $target = $customers->find($request->listData[0]);

        $target->name = $request->listData[1];
        $target->birth = $request->listData[2];
        $target->city = $request->listData[3];

        $target->save();
    }
}
