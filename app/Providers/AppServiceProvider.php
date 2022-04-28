<?php

namespace App\Providers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        $this->app->bind('Appservice', \App\Service\Appservice::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $appservice = app()->make('Appservice');
         View::share('Appservice', $appservice);
    }
}
