<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sub_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function index(){

        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
//            if (request()->)
            $totalCategory = Category::all()->whereBetween('created_at',[$start_date,$end_date])->count();
            $totalSub_Category = Sub_Category::all()->whereBetween('created_at',[$start_date,$end_date])->count();
//            $total_supplier = Supplier::all()->whereBetween('created_at',[$start_date,$end_date])->count();
//            $total_service = ServiceList::all()->whereBetween('created_at',[$start_date,$end_date])->count();
//            $total_warehouse = Warehouse::all()->whereBetween('created_at',[$start_date,$end_date])->count();
            $totalProduct = Product::all()->whereBetween('created_at',[$start_date,$end_date])->count();
            $totalBrand = Brand::all()->whereBetween('created_at',[$start_date,$end_date])->count();
//            $total_branch = Branch::all()->whereBetween('created_at',[$start_date,$end_date])->count();
//            $total_employee = Employee::all()->whereBetween('created_at',[$start_date,$end_date])->count();
//            $total_expenses = DB::table('invoices')->whereBetween('created_at',[$start_date,$end_date])->sum('totalamount');
//            $total_purchase = DB::table('receipts')->whereBetween('created_at',[$start_date,$end_date])->sum('total_price');
//            $total_sales_update = DB::table('sales_estinate_update_receipts')->whereBetween('created_at',[$start_date,$end_date])->sum('total_price');

        } else {
            $totalCategory = Category::all()->count();
            $totalSub_Category = Sub_Category::all()->count();
//            $total_supplier = Supplier::all()->count();
//            $total_service = ServiceList::all()->count();
//            $total_warehouse = Warehouse::all()->count();
            $totalProduct = Product::all()->count();
            $totalBrand = Brand::all()->count();
//            $total_branch = Branch::all()->count();
//            $total_employee = Employee::all()->count();
//            $total_expenses = DB::table('invoices')->sum('totalamount');
//            $total_purchase = DB::table('receipts')->sum('total_price');
//            $total_sales_update = DB::table('sales_estinate_update_receipts')->sum('total_price');
        }

//        $total_profit = $total_sales_update - ($total_purchase + $total_expenses);


//        return view('dashboard.index',[
//            'total_customer'=>$total_customer,
////            'total_supplier'=>$total_supplier,
////            'total_expenses'=>$total_expenses,
////            'total_purchase'=>$total_purchase,
////            'total_sales_update'=>$total_sales_update,
////            'total_service'=>$total_service,
////            'total_product'=>$total_product,
////
////            'total_profit' =>$total_profit,
////            'total_warehouse' =>$total_warehouse,
////            'total_branch' =>$total_branch,
////            'total_employee' =>$total_employee,
////
////
////            //dashboard price list
////            'ProductDashboard' => Product::all(),
//
//        ]);








//        $totalCategory = Category::count();
//        $totalSub_Category = Sub_Category::count();
//        $totalBrand = Brand::count();
//        $totalProduct = Product::count();

        $record = Product::select(\DB::raw("SUM(price) as price"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
//            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name','day')
            ->orderBy('day')
            ->get();

        $dayName = [];
        $price = [];

        foreach($record as $row) {
            $dayName[] = $row->day_name;
            $price[] = (int) $row->price;
        }

        return view('admin.home.home',compact('totalCategory','totalSub_Category','totalBrand','totalProduct','dayName','price'));

    }
}
