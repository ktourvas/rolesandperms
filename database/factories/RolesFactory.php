<?php

use ktourvas\rolesandperms\Entities\Role;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {

    return [
        'id' => 1,
        'name' => 'admin',
    ];

});