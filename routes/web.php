<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// for user or Others
route::get('/',[HomeController::class,'home']);
route::get('/product_details/{id}',[HomeController::class,'product_details']);
route::get('/dashboard',[HomeController::class,'login_home'])->middleware(['auth', 'verified'])->name('dashboard');
route::get('/add_cart/{id}',[HomeController::class,'add_cart'])->middleware(['auth', 'verified']);
route::get('mycart',[HomeController::class,'mycart'])->middleware(['auth', 'verified']);
route::get('delete_cart/{id}',[HomeController::class,'delete_cart'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin Start
route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin']);
route::get('category_view',[AdminController::class,'category_view'])->middleware(['auth','admin']);
route::post('add_category',[AdminController::class,'add_category'])->middleware(['auth','admin']);
route::get('delete_category/{id}',[AdminController::class,'delete_category'])->middleware(['auth','admin']);
route::get('edit_category/{id}',[AdminController::class,'edit_category'])->middleware(['auth','admin']);
route::post('update_category/{id}',[AdminController::class,'update_category'])->middleware(['auth','admin']);

// Product Start
route::get('add_product',[AdminController::class,'add_product'])->middleware(['auth','admin']);
route::post('store_product',[AdminController::class,'store_product'])->middleware(['auth','admin']);
route::get('show_product',[AdminController::class,'show_product'])->middleware(['auth','admin']);
route::get('delete_product/{id}',[AdminController::class,'delete_product'])->middleware(['auth','admin']);
route::get('edit_product/{id}',[AdminController::class,'edit_product'])->middleware(['auth','admin']);
route::post('update_product/{id}',[AdminController::class,'update_product'])->middleware(['auth','admin']);

// For Search
route::get('product_search',[AdminController::class,'product_search'])->middleware(['auth','admin']);
// Admin End

