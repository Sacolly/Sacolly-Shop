<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['quantity','id_product','id_user','color'];
    protected $table = "cart";
    public $timestamps = false;
}
