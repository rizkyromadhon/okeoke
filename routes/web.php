<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ClientController;
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


Route::controller(HomeController::class)->group(function() {
    Route::get('/', 'index')->name('home');
});

Route::controller(ClientController::class)->group(function() {
    Route::get('/category/{id}/{slug}', 'categoryPage')->name('category');
    Route::get('/product-details/{id}/{slug}', 'singleProduct')->name('singleproduct');
});

Route::get('/product/search', [ProductController::class, 'search'])->name('productSearch');

Route::middleware(['auth', 'cekrole:user,admin'])->group(function() {
    Route::controller(ClientController::class)->group(function() {
        Route::get('/add-to-cart', 'addToCart')->name('addtocart');
        Route::post('/add-product-to-cart', 'addProductToCart')->name('addproducttocart');
        Route::get('/shipping-address', 'getShippingAddress')->name('shippingaddress');
        Route::post('/add-shipping-address', 'addShippingAddress')->name('addshippingaddress');
        Route::post('/place-order', 'placeOrder')->name('placeorder');
        Route::get('/checkout', 'checkOut')->name('checkout');
        Route::get('/user-profile', 'userProfile')->name('userprofile');
        Route::get('/user-profile/pending-orders', 'pendingOrders')->name('pendingorders');
        Route::get('/user-profile/history', 'history')->name('history');
        Route::get('/remove-cart-item/{id}', 'removeCartItem')->name('removeitem');
    });
});

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
});

Route::middleware(['auth', 'cekrole:admin'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
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
        Route::get('/admin/edit-product-img/{id}', 'editProductImg')->name('editproductimg');
        Route::post('/admin/update-product-img', 'updateProductImg')->name('updateproductimg');
        Route::get('/admin/edit-product/{id}', 'editProduct')->name('editproduct');
        Route::post('/admin/update-product', 'updateProduct')->name('updateproduct');
        Route::get('/admin/delete-product/{id}', 'deleteProduct')->name('deleteproduct');
    });
    Route::controller(OrderController::class)->group(function () {
        Route::get('/admin/pending-order', 'index')->name('pendingorder');
    }); 
});

