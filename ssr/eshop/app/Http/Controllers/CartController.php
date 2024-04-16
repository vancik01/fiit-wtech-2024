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
            $cart->products()->attach($product->id, ['quantity' =>  $request->quantity]);

        } else {
            $cart = $request->user()->cart;
        
            if (!$cart) {
                $request->user()->cart()->create();
            }
        
    
        $cart->products()->attach($product->id, ['quantity' => $request->quantity]);
        }
    
        return back();
    }
    
    public function remove(Request $request)
    {
        $product = Product::find($request->product_id);

        if ($request->user() == null) {
            $user = User::where('name', 'Test User')->first();

            $user->cart()->create();
            $cart = $user->cart;
            $cart->products()->detach($product);

        } else {
            $cart = $request->user()->cart;
        
            if (!$cart) {
                $request->user()->cart()->create();
            }
        
    
        $cart->products()->detach($product);
        }
    
        return back();
    }

    
    public function index(Request $request)
    {
        if (!$request->user() ) {
        $guest_user = User::where('name', 'Test User')->first();
        $total = 0;
        foreach ($guest_user->cart->products as $product) {
            $total += $product->price * $product->pivot->quantity;
        }
            return view('cart',
                ['cart' => $guest_user->cart,
                'products' => $guest_user->cart->products,
                'total' => $total,
            ]);
        }
        else {
            $user = $request->user();
            $cart = $user->cart()->with('products')->first();
            $total = 0;
            foreach ($user->cart->products as $product) {
                $total += $product->price;
            }
            if (!$cart) {
                $request->user->cart()->create();
                $cart = $user->cart;
            }

            return view('cart', [
                'cart' => $cart,
                'products' => $cart->products,
                'total' => $total,
            ]);
    }
    }
}
