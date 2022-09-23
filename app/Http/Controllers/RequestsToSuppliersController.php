<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestsToSuppliers;
use Illuminate\Support\Facades\Schema;

class RequestsToSuppliersController extends Controller
{
    public function index() {
        
        $requestsToSuppliers = new RequestsToSuppliers();
        $query = $requestsToSuppliers->paginate(3);
        //dd($query);
        $header = Schema::getColumnListing('requests_to_suppliers');
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
            $requestsToSuppliers = new RequestsToSuppliers();
            $query = $requestsToSuppliers->find($target)->delete();
        }
    }

    public function insert(Request $request) {
        $requestsToSuppliers = new RequestsToSuppliers();

        foreach ($request->listData as $item) {
            $column = $item[0];
            $value = $item[1];
            $requestsToSuppliers->$column = $value;            
        }
        $requestsToSuppliers->save();
    }
}
