<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.nav', function ($view) {
            if (!session()->has('cart')) {
                session()->put('cart.total_price', 0);
                session()->put('cart.total_qtty', 0);
                session()->put('cart.products', []);
            }
            $cart       = session()->get('cart');
            $navCart    = ['total_price' => $cart['total_price'], 'total_qtty' => $cart['total_qtty']];
            $categories = Category::all();


            $view->with(compact('navCart', 'categories'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
