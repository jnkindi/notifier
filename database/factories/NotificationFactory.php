<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Notification;
use Faker\Generator as Faker;

$factory->define(Notification::class, function (Faker $faker) {
    return [
        'notification_message'=> $faker->paragraph
    ];
});
