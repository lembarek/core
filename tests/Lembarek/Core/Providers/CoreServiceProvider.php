<?php namespace Lembarek\Core\Providers;

use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

        if (! $this->app->routesAreCached()) {
              require __DIR__.'/../routes.php';
        }

        $this->publishes([
                __DIR__.'/../views' => base_path('resources/views/')
        ], 'views');

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
