<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('components.header', function ($view) {
            if (!Auth::check()) {
                $cart = Cart::find(2);
            } else {
            $cart = Auth::user()->cart;
            }
            $totalQuantity = $cart->products->sum('pivot.quantity');
            $view->with('totalQuantity', $totalQuantity);
        });
    }
}
