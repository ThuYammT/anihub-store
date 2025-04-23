<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::paginate(3);
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
       // dd($categories);

        return view('products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //upload photo
        $file=$request->file('photo');
        $photo_name="none";
        if($file){
            $photo_name="img_".rand(1000,9999).".".$file->extension();
            $file->move(public_path('uploads'),$photo_name);
        }

        Product::create([
            'category'=>$request->category,
            'name'=>$request->name,
            'price'=>$request->price,
            'photo'=>$photo_name
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product=Product::find($id);
        $categories=Category::all();
        return view('products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);

        if($request->new_category){
            $product->category=$request->new_category;
        }
        else{
            $product->category=$reuest->curr_category;
        }

        $product->name=$request->name;
        $product->price=$request->price;

        if($request->file('new_photo')){
            $photo_name="img_".rand(1000,9999).".".$file->extension();
            $file->move(public_path('uploads'),$photo_name);

        }
        else{
            $product->photo=$request->curr_photo;
        }

        $product->save();

        return redirect()->route('products.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }

    public function search(Request $request){
        $str=$request->search_term;

        $products=Product::where('category','LIKE','%'.$str.'%')
                 ->orWhere('name','LIKE','%'.$str.'%')
                 ->paginate(3);
              
        $products->appends(['search'=>$str]);
        return view('products.index',compact('products'));


       

    }
}
