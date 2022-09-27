<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestsToSuppliers extends Model
{
    use HasFactory;
    protected $fillable = ['nook_id', 
    'request_date', 
    'request_date', 
    'delivery_confirmation',
    'corporate_id'];
}
