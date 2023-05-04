<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getSearch(Request $request){
        $categories = Categories::all();
        $products = Products::where('name','like','%'.$request->input('key').'%')->orWhere('price',$request->input('key'))->get();
        return response()->view('user.search',['products'=>$products,'categories'=>$categories]);
    }
}
