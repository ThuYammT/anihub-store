<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderTrackController;

// Admin Routes (protected by auth and admin middleware)
Route::group(['middleware',['auth','admin']],function(){

    //eloquent routes
    Route::get('/admin',[AdminController::class,'index'])->name('admindb');
    Route::resource('category',CategoryController::class);
    Route::resource('products',ProductController::class);
    Route::get('search',[ProductController::class,'search'])->name('products.search');
    Route::resource('orders',OrderController::class);
    Route::resource('users',UserController::class);
   
    Route::get('usersearch',[UserController::class,'search'])->name('users.search');

    Route::get('adminordertrack/{id}',[OrderController::class,'track'])->name('orders.track');

    //OrderTracking Updates
    Route::get('update_order_1/{id}',[OrderTrackController::class,'orderConfirm'])->name('orders.confirmed');
    Route::get('update_order_2/{id}',[OrderTrackController::class,'orderPackaging'])->name('orders.packaging');
    Route::get('update_order_3/{id}',[OrderTrackController::class,'orderOntheway'])->name('orders.ontheway');
    Route::get('update_order_4/{id}',[OrderTrackController::class,'orderArrived'])->name('orders.arrived');

});

// Frontend Routes
Route::get('/', [FrontendController::class, 'welcome'])->name('welcome');
// AJAX Route to get products by category
Route::get('/category-products/{id}', [CategoryController::class, 'getProducts']);


// Shopping Cart Routes
Route::group(['middleware' => 'auth'], function() {
    Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'list'])->name('cart.list');
    Route::get('/cart/increase/{id}', [CartController::class, 'increase'])->name('cart.increase');
    Route::get('/cart/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease');
    Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/placeorder', [CartController::class, 'placeorder'])->name('cart.placeorder');
});

// Authentication Routes
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');