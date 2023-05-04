<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::select('products.name','products.price','products.avatar','cart.quantity','cart.id','cart.id_product','product_detail.color')
        ->join('products','products.id','=','cart.id_product')
        ->join('product_detail','product_detail.id','=','cart.id_detail')
        ->where('status','=',0)
        ->where('id_user','=',auth()->user()->id)
        ->get();
        return response()->view('user.cart',['carts'=>$carts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $request->input('id_product');
        $user = $request->input('id_user');
        $color = $request->input('color');
        $data = Cart::where('id_product','=',$product)->where('id_user','=',$user)->first();
        $check = Cart::where('id_detail','=',$color)->where('id_product','=',$product)->where('id_user','=',$user)->where('status','=',0)->count();
        if ($check > 0) {
            Cart::where('id_product','=',$product)->where('id_user','=',$user)->where('id_detail','=',$color)->where('status','=',0)->update([
                'quantity' => (int)$data['quantity'] + $request->input('quantity')
            ]);
            session()->flash('msg', 'The new category was created successfully!!');
        return redirect()->route('cart.index');
        }else{
             
        $cart = new Cart();
        $cart->quantity = $request->input('quantity');
        $cart->id_product = $request->input('id_product');
        $cart->id_detail = $request->input('color');
        $cart->id_user = $request->input('id_user');
        $cart->save();
        session()->flash('msg', 'The new category was created successfully!!');
        return redirect()->route('cart.index');
        }
    }

    public function payment($id)
    {
        $payment = Cart::select('cart.quantity','cart.id','products.name','products.avatar','products.price')
        ->join('products','products.id','=','cart.id_product')
        ->join('product_detail','product_detail.id','=','cart.id_detail')
        ->find($id);
        return response()->view('user.payment',['payment'=>$payment]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        Cart::where('id',$id)->delete();
        return redirect()->back();
    }
    public function order(Request $request, $id)
    {
        $quantity = $request->input('quantity');
        Cart::where('id',$id)->update([
            'quantity' => $quantity,
            'status' => 1
        ]);
        return redirect()->route('my_account.user');
    }
}
