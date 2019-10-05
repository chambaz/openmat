<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'title' => substr($faker->sentence(2), 0, -1),
        'description' => $faker->paragraph,
        'school' => substr($faker->sentence(2), 0, -1),
        'address' => $faker->address,
        'date' => $faker->date,
        'start_time' => $faker->time,
        'end_time' => $faker->time,
        'latitude' => $faker->latitude(),
        'longitude' => $faker->longitude()
    ];
});
