<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;

class PersonServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $routePerson = (Request::route('person') != null) ? Request::route('person') : null;
            $routePost = (Request::route('post') != null) ? Request::route('post') :null;
            $view->with(compact(['routePerson', 'routePost']));
        });
        
    }
}
