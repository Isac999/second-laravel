<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'genre', 'author', 'library_id'];

    public function libraries() {
        return $this->hasOne(Libraries::class, 'id');
    }

    public function author() {
        return $this->hasOne(Author::class, 'id');
    }

    public function categories() {
        return $this->hasOne(Categories::class, 'id');
    }
}
