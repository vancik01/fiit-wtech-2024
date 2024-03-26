<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});

Route::get(config("urls.product_detail.url"), function (Request $request) {
    $productId = $request->route("productId"); // access path parameter
    $limit = $request->query('limit'); // access query parameter

    return view('product_detail', ['productId' => $productId, 'limit' => $limit]);
});
