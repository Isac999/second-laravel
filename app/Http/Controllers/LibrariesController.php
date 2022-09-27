<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libraries;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class LibrariesController extends Controller
{
    public function index() {
        
        $libraries = new Libraries();
        $query = $libraries->paginate(3);

        $db_columns = DB::select('SHOW COLUMNS FROM '. 'libraries');
        $header = array_map(function($db_column) {
            return $db_column->Field;
        }, $db_columns);

        //$header = Schema::getColumnListing('libraries');
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
        $list = [];

        foreach ($request->listData as $item) {

            list($column, $value) = $item;
            $list[$column] = $value;
        }
        
        Libraries::create($list);
    }

    public function update(Request $request) {
        $libraries = new Libraries();
        $target = $libraries->find($request->listData[0]);

        $target->localization = $request->listData[1];

        $target->save();
    }
}
