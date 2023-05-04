<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductsDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $detail = Products::select('product_detail.*')
        ->join('product_detail','products.id','=','product_detail.products_id')
        ->where('products.id','=',$id)
        ->OrderBy('id')
        ->get();
        return response()->view('admin.products.details',['detail'=>$detail,'id'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return response()->view('admin.products.create_details',['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id)
    {
        $validate = Validator::make(
            $request->all(),
            [ 
                'description' => 'required ',
            ], 
            [ 
                'required' => ':attribute Do not leave blank',
            ] 
        );
        if($validate->fails()){
            return redirect()->route('details.create')->withErrors($validate);
        }
        else{
            $ProductsDetail = new ProductsDetail;
            $ProductsDetail->description = $request->input('description');
            $ProductsDetail->weight = $request->input('weight');
            $ProductsDetail->color = $request->input('color');
            $ProductsDetail->products_id = $id;

            $ProductsDetail->save();
            session()->flash('msg', 'The new category was created successfully!!');
            return redirect()->route('details.index',['id'=>$id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$id_product)
    {
        $product_details = ProductsDetail::find($id);
        return response()->view('admin.products.update_details',['product_details'=>$product_details,'id_product'=>$id_product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$id_product)
    {
        ProductsDetail::where('id',(int)$id)->update([
            'description' => $request->input('description'),
            'weight' => $request->input('weight'),
            'color' => $request->input('color'),
            'products_id' => $id_product,

             
        ]);
        session()->flash('msg', 'Update Successfully!!!!');
        return redirect()->route('details.index',['id'=>$id_product]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductsDetail::where('id',$id)->delete();
        return redirect()->back();
    }
}
