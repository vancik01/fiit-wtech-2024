<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $product = Product::find($request->product_id);
    
        $cart = $request->user()->cart;
        if (!$cart) {
            $cart = new Cart;
            $request->user()->cart()->save($cart);
        }
    
        $cart->products()->attach($product->id, ['quantity' => $request->quantity]);
    
        return back();
    }
    
    public function remove(Request $request)
    {
        $product = Product::find($request->product_id);
    
        $cart = $request->user()->cart;
        if ($cart) {
            $cart->products()->detach($product);
        }
    
        return back();
    }

    
    public function index(Request $request)
    {
        // dont forger to solve situatuion when user has no cart
        // user is not logged in
        // cart has no products
        if (!$request->user() ) {
            return view('cart',
                ['cart' => "null",
                'products' => "null-product",
            ]);
        }
        else {
            $cart = $request->user();
            #$randomProducts = Cart::with(['products'])->get();

            return view('cart', [
                'cart' => $cart,
                'products' => "a",
            ]);
    }
    }
}
