<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Images;
use App\Models\Products;
use App\Models\ProductsDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function home()
    {
        $products = Products::all();
        $new_products = Products::orderby('id','Desc')->get();
        return response()->view('user.index',['new_products'=>$new_products,'products'=>$products]);
    }
    public function admin()
    {
        $products = Products::all();
        return response()->view('admin.products.index',['products'=>$products]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categories = Categories::all();
        $products = Products::paginate(9);
        return response()->view('user.product',['products'=>$products,'categories'=>$categories]); 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return response()->view('admin.products.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [ 
                'name' => 'required | string | max:255',
            ], 
            [ 
                'required' => ':attribute Do not leave blank',
                'unique' => ':attribute already exists',
                'min' => ':attribute must bigger than :min',
                'max' => ':attribute must bigger than :max',
            ] 
        );
        
        if($validator->fails()){
            return redirect()->route('products.create')->withErrors($validator);
        }
        else{
        $path = 'images\products/';
            if(request()->hasFile(key:'avatar')){
                $avatar = request()->file(key: 'avatar');
                $avatar->move(base_path('public\images\products/'),$avatar->getClientOriginalName());
                $path = $path . $avatar->getClientOriginalName();
            }
             Products::create([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'categories_id' => $request->input('categories_id'),

                'avatar' => $path,
            ]);
            session()->flash('msg', 'The new employee was created successfully!!');
            return redirect()->route('products.index');
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
        $categories = Categories::all();
        $products = Products::where('id','!=',$id)->get();
        $images = Images::where('products_id','=',$id)->get();
        $product = Products::find($id);
        $details = ProductsDetail::where('products_id','=',$id)->get();
        return response()->view('user.product_detail',['categories'=>$categories,'products'=>$products,'product'=>$product,'images'=>$images,'details'=>$details]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories_id = Products::select('categories.*')
        ->join('categories','products.categories_id','=','categories.id')
        ->where('products.id','=',$id)
        ->first();
        $categories = Categories::all();
        $product = Products::find($id);
        return response()->view('admin.products.update',['product'=>$product,'categories'=>$categories,'categories_id'=>$categories_id]);
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
        Products::where('id',(int)$id)->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
        ]);
        if(request()->hasFile(key:'avatar')){
            $path ="images\products/";
            $avatar = request()->file(key: 'avatar');
            $avatar->move(base_path('public\images\products/'),$avatar->getClientOriginalName());
            $path = $path . $avatar->getClientOriginalName();
            Products::where('id',(int)$id)->update([
                'avatar' => $path,
            ]);
        }
        session()->flash('msg', 'Update Successfully!!!!');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Products::where('id',$id)->delete();
        return redirect()->action([ProductController::class,'index']);
    }
}