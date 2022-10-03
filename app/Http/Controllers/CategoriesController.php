<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function index() {

        $category = new Categories();
        $query = $category->paginate(15);

        //$header = Schema::getColumnListing('category');
        $db_columns = DB::select('SHOW COLUMNS FROM '. 'categories');
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
            $query = Categories::findOrFail($target)->delete();
        }
    }

    public function insert(Request $request) {
        //$category = new Categories();
        $list = [];
        foreach ($request->listData as $item) {

            list($column, $value) = $item;
            $list[$column] = $value;
        }
        //print_r($list);
        Categories::create($list);
        //$category->save();
    }

    public function update(Request $request) {
        $target = Categories::findOrFail($request->listData[0]);

        $target->update([
            'category' => $request->listData[1]
        ]);

        $target->save();
    }
}
