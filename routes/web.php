<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['role:super-admin|admin']], function(){

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/product', [AdminController::class, 'product'])->name('product');
    Route::get('/dashboard/category', [CategoryController::class, 'category'])->name('category');
    Route::get('/dashboard/category/add', [CategoryController::class, 'add'])->name('add.category');
    Route::post('/dashboard/category/add', [CategoryController::class, 'store'])->name('store.category');
    Route::get('/dashboard/category/edit/{id}', [CategoryController::class, 'edit'])->name('edit.category');
    Route::put('/dashboard/category/edit/{id}', [CategoryController::class, 'update'])->name('update.category');
    Route::get('/dashboard/category/delete/{id}', [CategoryController::class, 'destroy'])->name('destroy.category');
    
});

