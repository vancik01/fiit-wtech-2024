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
            $user = User::where('name', 'Guest User')->first();
        } else {
            $user = $request->user();
        }

        $total = 0;
        foreach ($user->cart->products as $product) {
            $total += $product->price*$product->pivot->quantity;
        };

        $num_of_products = $user->cart->products->count();
        if ($num_of_products == 0) {
            return back();
        }

        return view('checkout',
            ['products' => $user->cart->products,
            'total' => $total,
        ]);
    }
}
