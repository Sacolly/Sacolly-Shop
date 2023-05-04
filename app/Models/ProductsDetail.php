<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsDetail extends Model
{
    protected $fillable = ['description','weight','color','	products_id'];
    protected $table = "product_detail";
    public $timestamps = false;
}

