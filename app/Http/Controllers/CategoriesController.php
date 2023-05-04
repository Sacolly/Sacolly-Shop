<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        return response()->view('admin.categories.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('admin.categories.create');
        
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
                'avatar'=>'required',
            ], 
            [ 
                'required' => ':attribute Do not leave blank',
                'unique' => ':attribute already exists',
                'min' => ':attribute must bigger than :min',
                'max' => ':attribute must bigger than :max',
            ] 
        );
        
        if($validator->fails()){
            return redirect()->route('account.create')->withErrors($validator);
        }
        else{
        $path = 'images\categories/';
            if(request()->hasFile(key:'avatar')){
                $avatar = request()->file(key: 'avatar');
                $avatar->move(base_path('public\images\categories/'),$avatar->getClientOriginalName());
                $path = $path . $avatar->getClientOriginalName();
            }
            Categories::create([
                'name' => $request->input('name'),
                'avatar' => $path,
            ]);
            session()->flash('msg', 'The new employee was created successfully!!');
            return redirect()->route('categories.index');
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
        $products = Products::where('categories_id','=',$id)->get();
        return response()->view('user.category',['products'=>$products,'categories'=>$categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $category = Categories::find($id);
        return response()->view('admin.categories.update',['category'=>$category]);
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
        Categories::where('id',(int)$id)->update([
            'name' => $request->input('name'),
        ]);
        if(request()->hasFile(key:'avatar')){
            $path ="images\categories/";
            $avatar = request()->file(key: 'avatar');
            $avatar->move(base_path('public\images\categories/'),$avatar->getClientOriginalName());
            $path = $path . $avatar->getClientOriginalName();
            Categories::where('id',(int)$id)->update([
                'avatar' => $path,
            ]);
        }
        session()->flash('msg', 'Update Successfully!!!!');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categories::where('id',$id)->delete();
        return redirect()->action([CategoriesController::class,'index']);
    }
}
