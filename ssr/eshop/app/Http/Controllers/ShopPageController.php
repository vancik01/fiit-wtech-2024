<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopPageController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'manufacturer'])->get();

        return view('shop', [
            'products' => $products
        ]);
    }
}
