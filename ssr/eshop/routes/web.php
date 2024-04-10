<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
//
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('homepage');
})->middleware(['auth', 'verified'])->name('/');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::post('/kosik/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/kosik/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/kosik', [CartController::class, 'index'])->name('cart');


use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\ShopPageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchResultController;

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::get(config("urls.product_detail.url"), [ProductDetailController::class, 'index']);
Route::get(config("urls.search_results.url"), [SearchResultController::class, 'index']);

/*
Route::get(config("urls.cart.url"), function () {
    return view('cart');
});
*/
Route::get(config("urls.checkout.url"), function () {
    return view('checkout');
});

Route::get(config("urls.admin_new_product.url"), function () {
    return view('admin.create_product');
});

Route::get(config("urls.shop.url"), function () {
    return view('shop');
});

Route::get(config("urls.shop.url"), [ShopPageController::class, 'index']);


Route::get(config("urls.log_in.url"), function () {
    return view('users.login');
});

Route::get(config("urls.register.url"), function () {
    return view('users.register');
});

Route::get(config("urls.admin_view_products.url"), function () {
    return view('admin.view_products');
});

Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
