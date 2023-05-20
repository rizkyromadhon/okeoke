<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Controllers\SubCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('home', [
        "title" => 'Home'
    ]);
});

Route::get('/product', function () {
    return view('product', [
        "title" => 'product'
    ]);
});


Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
});

Route::middleware(['auth', 'cekrole:admin'])->group(function () {
    Route::controller(AdminController::class)->group(function (){
        Route::get('/admin', 'index');
    });
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/admin/all-category', 'index')->name('allcategory');
        Route::get('/admin/add-category', 'addCategory')->name('addcategory');
        Route::post('/admin/store-category', 'storeCategory')->name('storecategory');
        Route::get('/admin/edit-category/{id}', 'editCategory')->name('editcategory');
        Route::post('/admin/update-category', 'updateCategory')->name('updatecategory');
        Route::get('/admin/delete-category/{id}', 'deleteCategory')->name('deletecategory');
    });
    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/admin/all-subcategory', 'index')->name('allsubcategory');
        Route::get('/admin/add-subcategory', 'addSubCategory')->name('addsubcategory');
        Route::post('/admin/store-subcategory', 'storeSubCategory')->name('storesubcategory');
        Route::get('/admin/edit-subcategory/{id}', 'editSubCat')->name('editsubcat');
        Route::get('/admin/delete-subcategory/{id}', 'deleteSubCat')->name('deletesubcat');
        Route::post('/admin/update-subcategory', 'updateSubCat')->name('updatesubcat');
    });
    Route::controller(ProductController::class)->group(function () {
        Route::get('/admin/all-product', 'index')->name('allproducts');
        Route::get('/admin/add-product', 'addProduct')->name('addproduct');
        Route::post('/admin/store-product', 'storeProduct')->name('storeproduct');
    });
    Route::controller(OrderController::class)->group(function () {
        Route::get('/admin/pending-order', 'index')->name('pendingorder');
    }); 
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/cart', [CartController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'index']);
});


