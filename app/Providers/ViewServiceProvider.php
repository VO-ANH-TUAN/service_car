<?php

namespace App\Providers;
use App\Http\View\Composers\CartComposer;
use App\Http\View\Composers\MenuComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //truyen vao main vs noi dung o MenuComposer.php
       View::composer('header',MenuComposer::class);
       View::composer('cart',CartComposer::class);
       View::composer('footer',MenuComposer::class);
       View::composer('App\Http\Controllers\CheckoutController',CartComposer::class);

    }
}
