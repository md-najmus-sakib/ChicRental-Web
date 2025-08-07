<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        // Register any application services here
        // For example, you can bind interfaces to implementations
        // $this->app->bind('App\Contracts\SomeInterface', 'App\Services\SomeService');
    }

    public function boot()
    {
        View::composer('*', function ($view) {
            $cartCount = 0;
            if (Auth::check()) {
                $cartCount = \App\Models\CartItem::where('user_id', Auth::id())->count();
            }
            $view->with('cartCount', $cartCount);
        });
    }
}