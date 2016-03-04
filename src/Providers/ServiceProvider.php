<?php

 namespace Lembarek\Core\Providers;

use Illuminate\Support\ServiceProvider as MainServiceProvider;

abstract class ServiceProvider extends MainServiceProvider
{
    /**
    * it replace most thing that you can in boot in provider for packages
    *
    * @param  string  $dir
    * @return void
    */
    public function fullBoot($package, $dir)
    {
        if (file_exists($dir.'/routes.php')) {
            if (! $this->app->routesAreCached()) {
                require $dir.'/routes.php';
            }
        }

        if (file_exists("$dir/config/$package.php")) {
            $this->mergeConfigFrom(
                "$dir/config/$package.php",
                "$package"
            );
        }
        if (file_exists($dir.'/views')) {
            $this->loadViewsFrom($dir.'/views', $package);
        }

        if (file_exists($dir.'/migrations')) {
            $this->publishes([
                $dir.'/migrations' => base_path('database/migrations/')
            ], 'migrations');
        }

        if (file_exists($dir.'/config')) {
            $this->publishes([
                $dir.'/config' => config_path()."/vendor/$package",
            ]);
        }

    }
}
