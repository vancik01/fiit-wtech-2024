<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
//
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\ShopPageController;

// Route::get('/', function () {
//     return view('homepage');
// });

Route::get('/', [HomepageController::class, 'index']);


// Route::get(config("urls.product_detail.url"), function (Request $request) {
//     $productId = $request->route("productId"); // access path parameter
//     $limit = $request->query('limit'); // access query parameter

//     return view('product_detail', ['productId' => $productId, 'limit' => $limit]);
// });


Route::get(config("urls.product_detail.url"), [ProductDetailController::class, 'index']);


Route::get(config("urls.cart.url"), function () {
    return view('cart');
});

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
