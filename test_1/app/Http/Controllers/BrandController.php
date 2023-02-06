<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    //__ brand index method__//
    public function index(){
        $brands = Brand::all();
        return view('admin.brand.index',compact('brands'));
    }

    //__brand create method__//
    public function create(){
        return view('admin.brand.create');
    }

    //__brand store method__//
    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|max:255|unique:brands',
            'description' => 'max:300',
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name,'-');
        $brand->description = $request->description;
        $brand->save();
        return redirect()->route('brand.index')->with('success','Brand Create Successful');
    }

//    //__brand edit method__//
//    public function edit($id){
//
//        $brand = Brand::find($id);
//        return view('admin.brand.edit',compact('brand'));
//    }
//
//    //__brand update method__//
//    public function update(Request $request,$id){
//
//        $brand = Brand::find($id);
//        $brand->name = $request->name;
//        $brand->slug = Str::slug($request->name,'-');
//        $brand->description = $request->description;
//        $brand->save();
//        return redirect()->route('brand.index')->with('success','Brand Create Successful');
//    }
}
