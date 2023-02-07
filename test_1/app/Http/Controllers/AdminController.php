<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sub_Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $totalCategory = Category::count();
        $totalSub_Category = Sub_Category::count();
        $totalBrand = Brand::count();
        $totalProduct = Product::count();
//        dd($totalCategory);
        return view('admin.home.home',compact('totalCategory','totalSub_Category','totalBrand','totalProduct'));
    }
}
