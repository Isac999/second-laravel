<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suppliers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class SuppliersController extends Controller
{
    public function index() {
        
        $suppliers = new Suppliers();
        $query = $suppliers->paginate(3);

        $db_columns = DB::select('SHOW COLUMNS FROM '. 'suppliers');
        $header = array_map(function($db_column) {
            return $db_column->Field;
        }, $db_columns);

        //$header = Schema::getColumnListing('suppliers');
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
        $list = [];

        foreach ($request->listData as $item) {

            list($column, $value) = $item;
            $list[$column] = $value;
        }
        
        Suppliers::create($list);
    }

    public function update(Request $request) {
        $suppliers = new Suppliers();
        $target = $suppliers->find($request->listData[0]);

        $target->corporate_name = $request->listData[1];
        $target->localization = $request->listData[2];

        $target->save();
    }
}
