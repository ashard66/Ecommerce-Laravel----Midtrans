<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/shop', [App\Http\Controllers\HomeController::class, 'shop'])->name('shop');
Route::get('/category/{id}', [App\Http\Controllers\HomeController::class, 'viewcategory'])->name('view.category');
Route::get('/product-detail/{id}', [App\Http\Controllers\HomeController::class, 'productdetail'])->name('product.detail');

Route::middleware(['auth'])->group(function() {
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/order', [OrderController::class, 'orderDetail'])->name('order');
    Route::get('/provinsi', [CheckoutController::class, 'get_province'])->name('provinsi');
    Route::get('/kota/{id}', [CheckoutController::class, 'get_city'])->name('city');
    Route::get('/origin={city_origin}&destination={city_destination}&weight={weight}&courier={courier}', [App\Http\Controllers\CheckoutController::class, 'get_ongkir'])->name('ongkir');

});

Route::post('/add-to-cart', [CartController::class, 'addCart'])->name('add.cart');
Route::post('/delete-cart', [CartController::class, 'deleteCart'])->name('delete.cart');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('update.cart');


Route::group(['middleware' => ['role:super-admin|admin']], function(){

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/dashboard/product', [ProductController::class, 'product'])->name('product');
    Route::get('/dashboard/product/add', [ProductController::class, 'add'])->name('add.product');
    Route::post('/dashboard/product/add', [ProductController::class, 'store'])->name('store.product');
    Route::get('/dashboard/product/edit/{id}', [ProductController::class, 'edit'])->name('edit.product');
    Route::put('/dashboard/product/edit/{id}', [ProductController::class, 'update'])->name('update.product');
    Route::get('/dashboard/product/delete/{id}', [ProductController::class, 'destroy'])->name('destroy.product');

    Route::get('/dashboard/category', [CategoryController::class, 'category'])->name('category');
    Route::get('/dashboard/category/add', [CategoryController::class, 'add'])->name('add.category');
    Route::post('/dashboard/category/add', [CategoryController::class, 'store'])->name('store.category');
    Route::get('/dashboard/category/edit/{id}', [CategoryController::class, 'edit'])->name('edit.category');
    Route::put('/dashboard/category/edit/{id}', [CategoryController::class, 'update'])->name('update.category');
    Route::get('/dashboard/category/delete/{id}', [CategoryController::class, 'destroy'])->name('destroy.category');
    
});

