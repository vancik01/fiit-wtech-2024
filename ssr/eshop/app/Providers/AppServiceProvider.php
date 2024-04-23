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
                $cart = Cart::where('user_id', 9223372036854775807)->first();
            } else {
            $cart = Auth::user()->cart;
            }
            // count only products id, not quantity
            if ($cart == null) {
                $totalQuantity = 0;
            } else {
                $totalQuantity = $cart->products->count();
            }
            $view->with('totalQuantity', $totalQuantity);
        });
    }
}
