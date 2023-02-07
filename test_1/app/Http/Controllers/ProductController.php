<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Sub_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    //__product index method__//
    public function index(){
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    //__product create method__//
    public function create(){
        $sub_categories = Sub_Category::all();
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create',compact('categories','brands','sub_categories'));
    }

    //__product store method__//
    public function store (Request $request){

        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->code = $this->generateUniqueCode();
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->brand_id = $request->brand_id;
        $product->image = $this->saveImage($request);
        $product->save();
        return redirect()->route('product.index')->with('success','Product added successful');
    }
    //__product image save method__//
    public function saveImage(Request $request){
        $image =$request->file('image');
        $imageName =rand().'.'.$image->extension();
        $directory ='adminAsset/upload-image/product-image/';
        $imageUrl = $imageName;
        $image->move($directory,$imageName);
        return $imageUrl;
    }

    //__product code generator method__//
    public function generateUniqueCode()
    {
        do {
            $code = Str::random(3).substr(time(), 6,8).Str::random(3);
        } while (Product::where("code", "=", $code)->first());
        return strtoupper($code);
    }

    //__product edit method__//
    public function edit($id){
        $sub_categories = Sub_Category::all();
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::find($id);
        return view('admin.product.edit',compact('product','categories','brands','sub_categories'));
    }


    //__product update method__//
    public function update (Request $request,$id){

        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->code = $request->code;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->brand_id = $request->brand_id;
        if ($product->image){
            if (file_exists($product->image)){
                unlink($product->image);
            }
        }
        $product->image = $this->saveImage($request);
        $product->save();
        return redirect()->route('product.index')->with('success','Product added successful');
    }

    //__product delete method__//
    public function delete($id){
        $product = Product::find($id);
        if ($product->image){
            if (file_exists(asset('adminAsset/upload-image/product-image/'.$product->image))){
                unlink(asset('adminAsset/upload-image/product-image/'.$product->image));
            }
        }
        $product->delete();
        return redirect()->back();
    }
}