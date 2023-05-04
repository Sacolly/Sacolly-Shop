<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['name','price','avatar','categories_id'];
    protected $table = "products";
    public $timestamps = false;
}
