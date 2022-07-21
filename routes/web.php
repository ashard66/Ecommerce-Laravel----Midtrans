<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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

