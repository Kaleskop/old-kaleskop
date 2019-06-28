<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use URL;
use Illuminate\Support\Facades\Blade;
use Auth;

class AppServiceProvider extends ServiceProvider
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
        URL::forceScheme( 'https' );

        Blade::if( 'business', function() {
         return Auth::check()
          && Auth::user()->hasBusiness();
        } );
    }
}
