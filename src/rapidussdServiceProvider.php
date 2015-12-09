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
        $this->loadViewsFrom(__DIR__.'/resources/views', 'courier');
        $this->publishes([
            __DIR__.'/Http/migrations/' => database_path('/migrations')
        ], 'migrations');
        $this->publishes([
            __DIR__.'/Http/seeds/' => database_path('/seeds')
        ], 'seeds');
        $this->publishes([
            __DIR__.'/Http/Controllers/' => database_path('../app/Http/Controllers')
        ], 'Controllers');
        $this->publishes([
            __DIR__.'/Http/models/' => database_path('../app/')
        ], 'Models');

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