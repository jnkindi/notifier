<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'rate_limit' => 0,
        'month_quota' => $faker->numberBetween($min = 100, $max = 150)
    ];
});
