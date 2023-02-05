<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
//    category index method
    public function index (){
        $categories = Category::all();

//        dd($categories)
        return view('admin.category.categoryList',compact('categories'));
    }

    //__category create method__//
    public function create (){
        return view('admin.category.create');
    }

    //__category store method__//
    public function store (Request $request){

        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'description' => 'max:500',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->description = $request->description;
        $category->save();
        return redirect()->back()->with('success','Category added successful');
    }

    //__category edit method__//
    public function edit ($id){
        $categories = Category::find($id);
        return view('admin.category.edit',compact('categories'));
    }

    //__category update method__//
    public function update (Request $request,$id){

        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'max:500',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->description = $request->description;
        $category->save();
        return redirect()->route('category.index')->with('success','Category Update successful');

    }

    public function delete($id){
        $supplier = Category::find($id);
        $supplier->delete();
        return redirect()->back()->with('success','Supplier Delete successful');
    }
}
