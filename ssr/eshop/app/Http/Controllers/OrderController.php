<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{
    public function store(Request $request)
    {

        $user = auth()->user();
        if (!$user) {
            $user = User::where('name', 'Test User')->first();
        }
        $order = new Order;
        $order->user_id = $user->id;

        $order->name = $request->name;
        $order->surname = $request->surname;
        $order->email = $request->email;
        $order->street = $request->street;
        $order->num = $request->num;
        $order->city = $request->city;
        $order->zip = $request->zip;
        $order->shipping_type_id = $request->doprava;
        $order->payment_type = $request->payment;
        $order->price = $request->total;
        $order->note = $request->note;

        $order->save();
        

        return back()->with('success', 'Objednávka odoslaná!');
    }
}
