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
            $query = Customers::findOrFail($target)->delete();
        }
    }

    public function insert(Request $request) {
        $list = [];

        foreach ($request->listData as $item) {

            list($column, $value) = $item;
            $list[$column] = $value;
        }
        
        Customers::create($list);
    }

    public function update(Request $request) {
        $target = Customers::findOrFail($request->listData[0]);

        $target->name = $request->listData[1];
        $target->birth = $request->listData[2];
        $target->city = $request->listData[3];

        $target->save();
    }
}
