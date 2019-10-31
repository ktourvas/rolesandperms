<?php

use ktourvas\rolesandperms\Entities\ModelPermissionsSet;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(ModelPermissionsSet::class, function (Faker $faker) {

    return [

        'user_id' => 1,
        'policy' => $faker->lastName,
        'viewany' => $faker->numberBetween(0, 1),
        'view' => $faker->numberBetween(0, 1),
        'create' => $faker->numberBetween(0, 1),
        'update' => $faker->numberBetween(0, 1),
        'delete' => $faker->numberBetween(0, 1),
        'restore' => $faker->numberBetween(0, 1),
        'forcedelete' => $faker->numberBetween(0, 1),

    ];

});
