<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Products;
use App\Models\turnover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
        

    public function index()
    {
        if(Auth::user()->role_id == '1'){
            return redirect()->route('turnover');
        }
        if (Auth::user()->role_id == '2') {
            $products = Products::all();
            $new_products = Products::orderby('id','Desc')->get();
            return response()->view('user.index',['new_products'=>$new_products,'products'=>$products]);
        }
        else{
            Auth::logout();
            return view('auth/login');
        }
    }

    public function turnover()
    {
        $turnover = turnover::all();
        return response()->view('admin.home.turnover',['turnover'=>$turnover]);
    }
    public function accept()
    {
        $accepts = Cart::select('users.name','users.phone','users.email','products.name as name_product','products.price','cart.quantity','cart.id')
        ->join('products','products.id','=','cart.id_product')
        ->join('users','users.id','=','cart.id_user')
        ->where('status','=',1)
        ->get();
        return response()->view('admin.home.accept',['accepts'=>$accepts]);
    }
    public function accept_success(Request $request,$id)
    {
        Cart::where('id',$id)->update([
            'status' => 2
        ]);
        $turnover = new turnover();
        $turnover->quantity = $request->input('quantity');
        $turnover->total = $request->input('total');
        $turnover->id_cart = $id;
        $turnover->save();

        return redirect()->back();
    }
}
