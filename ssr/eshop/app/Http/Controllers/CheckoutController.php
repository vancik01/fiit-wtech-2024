<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->user() ) {
            $user = User::where('name', 'Test User')->first();
        } else {
            $user = $request->user();
        }

        $total = 0;
        foreach ($user->cart->products as $product) {
            $total += $product->price*$product->pivot->quantity;
        };

        return view('checkout',
            ['user' => $user,
            'cart' => $user->cart,
            'products' => $user->cart->products,
            'total' => $total,
        ]);
    }
}
