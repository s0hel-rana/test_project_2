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

//    category create method
    public function create (){
        return view('admin.category.create');
    }

    //    category store method
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
}
