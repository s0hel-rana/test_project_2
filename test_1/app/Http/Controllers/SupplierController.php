<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //    supplier index method
    public function index (){
        $suppliers = Supplier::all();
        return view('admin.supplier.index',compact('suppliers'));
    }

//    supplier create method
    public function create (){
        return view('admin.supplier.create');
    }

//    supplier store method
    public function store (Request $request){

        $validated = $request->validate([
            'name' => 'required|max:255',
            'address' => 'max:300',
        ]);

        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->code = $request->code;
        $supplier->address = $request->address;
        $supplier->status = $request->status;
        $supplier->save();
        return redirect()->back()->with('success','Supplier added successful');
    }

//    supplier edit method
    public function edit($id){
        $supplier = Supplier::find($id);
        return view('admin.supplier.edit',compact('supplier'));
    }

    //    supplier edit method
    public function update(Request $request, $id){

        $validated = $request->validate([
            'name' => 'required|max:255',
            'address' => 'max:300',
        ]);

        $supplier = Supplier::find($id);
        $supplier->name = $request->name;
        $supplier->code = $request->code;
        $supplier->address = $request->address;
        $supplier->status = $request->status;
        $supplier->save();
        return redirect()->route('supplier.index')->with('success','Supplier Update successful');
    }
//    supplier destroy method
    public function delete($id){
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect()->back()->with('success','Supplier Delete successful');
    }
}
