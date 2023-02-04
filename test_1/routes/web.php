<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin.home.home');
});
//__category route__//
Route::get('/category/index',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');

//__sub-category route__//

Route::get('/sub-category/index',[SubCategoryController::class,'index'])->name('sub-category.index');
Route::get('/sub-category/create',[SubCategoryController::class,'create'])->name('sub-category.create');
Route::post('/sub-category/store',[SubCategoryController::class,'store'])->name('sub-category.store');

//__supplier route__//

Route::get('/supplier/index',[SupplierController::class,'index'])->name('supplier.index');
Route::get('/supplier/create',[SupplierController::class,'create'])->name('supplier.create');
Route::post('/supplier/store',[SupplierController::class,'store'])->name('supplier.store');
Route::get('/supplier/delete/{id}',[SupplierController::class,'delete'])->name('supplier.delete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
