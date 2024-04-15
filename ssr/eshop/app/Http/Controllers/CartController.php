<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $product = Product::find($request->product_id);

        if ($request->user() == null) {
            $user = User::where('name', 'Test User')->first();

            $user->cart()->create();
            $cart = $user->cart;
            $cart->products()->attach($product->id, ['quantity' => 1]);

        } else {
            $cart = $request->user()->cart;
        
            if (!$cart) {
                $request->user()->cart()->create();
            }
        
    
        $cart->products()->attach($product->id, ['quantity' => 1]);
        }
    
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
        // create guesst host and cart
        $guest_user = User::where('name', 'Test User')->first();
            return view('cart',
                ['cart' => $guest_user->cart,
                'products' => $guest_user->cart->products,
            ]);
        }
        else {
            $user = $request->user();
            $cart = $user->cart;

            return view('cart', [
                'cart' => $cart,
                'products' => $cart->products,
            ]);
    }
    }
}
