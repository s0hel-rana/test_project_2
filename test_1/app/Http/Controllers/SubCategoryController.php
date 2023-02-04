<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sub_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
//    sub category index method

    public function index(){
        $sub_cat = Sub_Category::all();
        return view('admin.subCategory.index',compact('sub_cat'));
    }

//    sub category index method

    public function create(){
        $categories = Category::all();
        return view('admin.subCategory.create',compact('categories'));
    }

    //    category store method
    public function store (Request $request){

        $validated = $request->validate([
            'sub_name' => 'required|unique:sub__categories|max:255',
            'description' => 'max:500',
        ]);

        $category = new Sub_Category();
        $category->sub_name = $request->sub_name;
        $category->sub_slug = Str::slug($request->sub_name, '-');
        $category->description = $request->description;
        $category->category_id = $request->category_id;
        $category->save();
        return redirect()->back()->with('success','Sub Category added successful');
//        return redirect(route('admin.subCategory.index'));
    }

    public function delete($id){
        $supplier = Sub_Category::find($id);
        $supplier->delete();
        return redirect()->back()->with('success','Supplier Delete successful');
    }
}
