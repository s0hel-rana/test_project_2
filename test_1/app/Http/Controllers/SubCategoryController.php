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

    //   sub category store method
    public function store (Request $request){

        $validated = $request->validate([
            'sub_name' => 'required|unique:sub__categories|max:255',
            'description' => 'max:500',
        ]);

        $sub_category = new Sub_Category();
        $sub_category->sub_name = $request->sub_name;
        $sub_category->sub_slug = Str::slug($request->sub_name, '-');
        $sub_category->description = $request->description;
        $sub_category->category_id = $request->category_id;
        $sub_category->save();
        return redirect()->back()->with('success','Sub Category added successful');
//        return redirect(route('admin.subCategory.index'));
    }

    //   sub category edit method
    public function edit ($id){
        $categories = Category::all();
        $sub_category = Sub_Category::find($id);
        return view('admin.subCategory.edit',compact('sub_category','categories'));
    }

    //    sub category update method
    public function update (Request $request,$id){

        $validated = $request->validate([
            'sub_name' => 'required|max:255',
            'description' => 'max:500',
        ]);

        $sub_category = Sub_Category::find($id);
        $sub_category->sub_name = $request->sub_name;
        $sub_category->sub_slug = Str::slug($request->sub_name, '-');
        $sub_category->description = $request->description;
        $sub_category->category_id = $request->category_id;
        $sub_category->save();
        return redirect()->route('sub-category.index')->with('success','Sub Category Update successful');

    }

    public function delete($id){
        $sub_category = Sub_Category::find($id);
        $sub_category->delete();
        return redirect()->back()->with('success','Supplier Delete successful');
    }
}
