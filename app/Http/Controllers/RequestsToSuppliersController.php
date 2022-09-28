<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestsToSuppliers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class RequestsToSuppliersController extends Controller
{
    public function index() {
        
        $requestsToSuppliers = new RequestsToSuppliers();
        $query = $requestsToSuppliers->paginate(15);

        $db_columns = DB::select('SHOW COLUMNS FROM '. 'requests_to_suppliers');
        $header = array_map(function($db_column) {
            return $db_column->Field;
        }, $db_columns);

        //$header = Schema::getColumnListing('requests_to_suppliers');
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
            $query = RequestsToSuppliers::findOrFail($target)->delete();
        }
    }

    public function insert(Request $request) {
        $list = [];

        foreach ($request->listData as $item) {

            list($column, $value) = $item;
            $list[$column] = $value;
        }

        RequestsToSuppliers::create($list);
    }

    public function update(Request $request) {
        $target = RequestsToSuppliers::findOrFail($request->listData[0]);

        $target->book_id = $request->listData[1];
        $target->request_date = $request->listData[2];
        $target->delivery_confirmation = $request->listData[3];
        $target->corporate_id = $request->listData[4];

        $target->save();
    }
}
