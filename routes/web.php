<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// -------------------- VIEW ----------------- //
Route::view('/about', 'pages.about');
Route::view('/register_seller', 'auth.register_seller');
Route::view('/addItem', 'pages.addItem')->middleware('seller');

// ----------------------GET----------------  //
Route::get('/', [ItemController::class, 'mainPage']);
Route::get('/sellerItems/{seller_id}', [ItemController::class, 'showSellerItems'])->middleware('auth');
Route::get('/products', [ItemController::class, 'products']);

Route::get('/productDetails/{id}', [ItemController::class, 'productDetails'])->middleware('auth');
Route::get('/cart/addItem/{item_id}', [CartController::class, 'addItem'])->middleware('auth');
Route::get('/continueShopping', [CartController::class, "continueShopping"])->middleware('auth');
Route::get('/myOrders', [CartController::class, 'showMyOrders'])->middleware('auth');
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');
Route::get("/cart", [CartController::class, "showCart"])->middleware(['auth']);

Route::get('/user/{user_id}', [UserController::class, 'showUser'])->middleware(['admin']);
Route::get('/dashboard', [CartController::class, 'showOrders'])->middleware(['admin'])->name('dashboard');

// -------------------POST-------------  //
Route::post('/register_seller', [UserController::class, 'register_seller']);

Route::post('/changeQuantity', [CartController::class, "changeQuantity"])->middleware('auth');
Route::post('/changeInf', [UserController::class, 'changeInf'])->middleware('auth');
Route::post('/deleteUser', [UserController::class, 'deleteUser'])->middleware('auth');

Route::post('/addItem', [ItemController::class, 'addItem'])->middleware('seller');

Route::post('/deleteItem/{item_id}', [ItemController::class, 'deleteItem'])->middleware('sellerOrAdm');

Route::post('/changeStatus', [CartController::class, "changeStatus"])->middleware(['admin']);
Route::post('/deleteCartItem', [CartController::class, 'deleteCartItem'])->middleware(['admin']);
Route::post('/giveProp', [ItemController::class, 'giveProp'])->middleware(['admin']);

require __DIR__.'/auth.php';
