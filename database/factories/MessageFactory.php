<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {

    return [
        'user_name' => $faker->name,
        'msg' => $faker->realText(80),
    ];
});
