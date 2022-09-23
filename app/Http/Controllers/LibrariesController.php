<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libraries;
use Illuminate\Support\Facades\Schema;

class LibrariesController extends Controller
{
    public function index() {
        
        $libraries = new Libraries();
        $query = $libraries->paginate(3);
        //dd($query);
        $header = Schema::getColumnListing('libraries');
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
            $libraries = new Libraries();
            $query = $libraries->find($target)->delete();
        }
    }

    public function insert(Request $request) {
        $libraries = new Libraries();

        foreach ($request->listData as $item) {
            $column = $item[0];
            $value = $item[1];
            $libraries->$column = $value;            
        }
        $libraries->save();
    }
}
