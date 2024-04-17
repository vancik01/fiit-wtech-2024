<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $product = Product::find($request->product_id);
        $quantity = $request->quantity;

        if ($request->user() == null) {
            $user = User::where('name', 'Test User')->first();
    
            if (!$user->cart) {
                $user->cart()->create();
            }
    
            $cart = $user->cart;
        } else {
            $cart = $request->user()->cart;
    
            if (!$cart) {
                $cart = $request->user()->cart()->create();
            }
        }
    
        $pivot = $cart->products()->where('product_id', $product->id)->first();
    
        if ($pivot) {
            $cart->products()->updateExistingPivot($product->id, ['quantity' => $pivot->pivot->quantity + $quantity]);
        } else {
            $cart->products()->attach($product->id, ['quantity' => $quantity]);
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

    public function refresh(Request $request) {
        // Get the quantities array from the form data
        $quantities = $request->input('quantity');
        $product_id = $request->input('product_id');
        $product = Product::find($product_id);
    
        // Check if the product is not null
        if ($product !== null) {
            if ($request->user() == null) {
                $user = User::where('name', 'Test User')->first();
    
                if (!$user->cart) {
                    $user->cart()->create();
                }
    
                $cart = $user->cart;
            } else {
                $cart = $request->user()->cart;
    
                if (!$cart) {
                    $cart = $request->user()->cart()->create();
                }
            }
    
            $pivot = $cart->products()->where('product_id', $product->id)->first();
    
            if ($pivot) {
                // Get the quantity for the specific product
                $quantity = $quantities[$product->id];
    
                $cart->products()->updateExistingPivot($product->id, ['quantity' => $quantity]);
            } else {
                // Get the quantity for the specific product
                $quantity = $quantities[$product->id];
    
                $cart->products()->attach($product->id, ['quantity' => $quantity]);
            }
        }
    
        // After database is updated, return back to index function
        return $this->index($request);
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
                'total' => $total
            ]);
        }
        else {
            $user = $request->user();
            $cart = $user->cart()->with('products')->first();
            $total = 0;
            foreach ($user->cart->products as $product) {
                $total += $product->price * $product->pivot->quantity;
            }
            if (!$cart) {
                $request->user->cart()->create();
                $cart = $user->cart;
            }

            return view('cart', [
                'cart' => $cart,
                'products' => $cart->products,
                'total' => $total
            ]);
    }
    }
}
