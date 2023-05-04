<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class turnover extends Model
{
    protected $fillable = ['quantity','total','id_cart'];
    protected $table = "turnover";
    public $timestamps = false;
}
