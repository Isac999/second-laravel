<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libraries extends Model
{
    use HasFactory;
    protected $fillable = ['localization'];

    public function books() {
        //return $this->belongsTo(Books::class, 'library_id', 'id');
    }
}
