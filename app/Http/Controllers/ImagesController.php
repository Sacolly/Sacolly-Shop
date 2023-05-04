<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $images = Images::where('products_id','=',$id)->get();
        return response()->view('admin.products.images',['images'=>$images,'id'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return response()->view('admin.products.create_image',['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,$id)
    {
        $validator = Validator::make(
            $request->all(),
            [ 
                'avatar' => 'required',
            ], 
            [ 
                'required' => ':attribute Do not leave blank',
                'unique' => ':attribute already exists',
                'min' => ':attribute must bigger than :min',
                'max' => ':attribute must bigger than :max',
            ] 
        );
        
        if($validator->fails()){
            return redirect()->route('images.create')->withErrors($validator);
        }
        else{
        $path = 'images\products/';
            if(request()->hasFile(key:'avatar')){
                $avatar = request()->file(key: 'avatar');
                $avatar->move(base_path('public\images\products/'),$avatar->getClientOriginalName());
                $path = $path . $avatar->getClientOriginalName();
            }
             Images::create([
                'products_id'=>$id,
                'images' => $path,
                
            ]);
            session()->flash('msg', 'The new employee was created successfully!!');
            return redirect()->route('images.index',['id'=>$id]);
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
        $images = Images::find($id);
        return response()->view('admin.products.update_image',['images'=>$images,'id_product'=>$id_product]);
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
        if(request()->hasFile(key:'avatar')){
            $path ="images\products/";
            $avatar = request()->file(key: 'avatar');
            $avatar->move(base_path('public\images\products/'),$avatar->getClientOriginalName());
            $path = $path . $avatar->getClientOriginalName();
            Images::where('id',(int)$id)->update([
                'images' => $path,
            ]);
        }
        session()->flash('msg', 'Update Successfully!!!!');
        return redirect()->route('images.index',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
