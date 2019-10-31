<?php

namespace Tests;

use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use ktourvas\rolesandperms\Entities\ModelPermissionsSet;
use Orchestra\Testbench\TestCase;


class BaseTestCase extends TestCase
{

    use WithFaker, RefreshDatabase;

    protected function getPackageProviders($app)
    {
        return [
            'ktourvas\rolesandperms\RolesAndPermsServiceProvider'
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app) {
//        $app['config']->set('config-name', include __DIR__.'/../config/config-name.php' );
    }

    protected function setUp() : void
    {
        parent::setUp();

        $this->withFactories(__DIR__.'/../database/factories');

        $this->user = factory(TestUser::class)->make();

        $this->user->permissions()->saveMany(
            factory(ModelPermissionsSet::class, 10)->create()
        );

    }

}