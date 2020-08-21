<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'status' => random_int(0,127)
    ];
    //php artisan make:factory RoleFactory
});
