<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = ['category'];

    public function books() {
        //return $this->belongsTo(Books::class, 'category_id', 'id');
    }
}
