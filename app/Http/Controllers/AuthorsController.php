<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AuthorsController extends Controller
{
    public function index() {

        $author = new Author();
        $query = $author->paginate(15);

        //$header = Schema::getColumnListing('author');
        $db_columns = DB::select('SHOW COLUMNS FROM '. 'authors');
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
            $query = Author::findOrFail($target)->delete();
        }
    }

    public function insert(Request $request) {
        //$author = new Author();
        $list = [];
        foreach ($request->listData as $item) {

            list($column, $value) = $item;
            $list[$column] = $value;
        }
        //print_r($list);
        Author::create($list);
        //$author->save();
    }

    public function update(Request $request) {
        $target = Author::findOrFail($request->listData[0]);

        $target->update([
            'name' => $request->listData[1]
        ]);

        $target->save();
    }
}
