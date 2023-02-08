<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
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
Route::get('/admin',[\App\Http\Controllers\AdminController::class,'index'])->name('admin.index');

//__category route__//
Route::get('/category/index',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');

//__sub-category route__//

Route::get('/sub-category/index',[SubCategoryController::class,'index'])->name('sub-category.index');
Route::get('/sub-category/create',[SubCategoryController::class,'create'])->name('sub-category.create');
Route::post('/sub-category/store',[SubCategoryController::class,'store'])->name('sub-category.store');
Route::get('/sub-category/edit/{id}',[SubCategoryController::class,'edit'])->name('sub-category.edit');
Route::post('/sub-category/update/{id}',[SubCategoryController::class,'update'])->name('sub-category.update');
Route::get('/sub-category/delete/{id}',[SubCategoryController::class,'delete'])->name('sub-category.delete');

//__supplier route__//

Route::get('/supplier/index',[SupplierController::class,'index'])->name('supplier.index');
Route::get('/supplier/create',[SupplierController::class,'create'])->name('supplier.create');
Route::post('/supplier/store',[SupplierController::class,'store'])->name('supplier.store');
Route::get('/supplier/edit/{id}',[SupplierController::class,'edit'])->name('supplier.edit');
Route::post('/supplier/update/{id}',[SupplierController::class,'update'])->name('supplier.update');
Route::get('/supplier/delete/{id}',[SupplierController::class,'delete'])->name('supplier.delete');

//__brand route__//
Route::prefix('brand')->controller(BrandController::class)->group(function () {
    Route::get('/index', 'index')->name('brand.index');
    Route::get('/create', 'create')->name('brand.create');
    Route::post('/store', 'store')->name('brand.store');
    Route::get('/edit/{id}', 'edit')->name('brand.edit');
    Route::post('/delete/{id}', 'delete')->name('brand.delete');
});

//__Product route__//
Route::prefix('product')->controller(ProductController::class)->group(function () {
    Route::get('/index', 'index')->name('product.index');
    Route::get('/create', 'create')->name('product.create');
    Route::post('/store', 'store')->name('product.store');
    Route::get('/show/{id}', 'show')->name('product.show');
    Route::get('/edit/{id}', 'edit')->name('product.edit');
    Route::post('/update/{id}', 'update')->name('product.update');
    Route::get('/delete/{id}', 'delete')->name('product.delete');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
