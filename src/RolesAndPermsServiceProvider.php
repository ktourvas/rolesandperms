<?php

namespace ktourvas\rolesandperms;

use Illuminate\Support\ServiceProvider;

class RolesAndPermsServiceProvider extends ServiceProvider
{

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }

}
