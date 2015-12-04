<?php

namespace leyo\rapidussd;

use Illuminate\Support\ServiceProvider;

class rapidussdServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->router->group(['namespace' => 'leyo\rapidussd\Http\Controllers'],
            function(){
                require __DIR__.'/Http/routes.php';
            });
//        if (! $this->app->routesAreCached()) {
//            require __DIR__.'/Http/routes.php';
//        }
        $this->loadViewsFrom(__DIR__.'/resources/views', 'courier');

    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}