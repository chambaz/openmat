<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

$factory->define(Event::class, function (Faker $faker) {
    $randomUser = DB::table('users')->inRandomOrder()->first();
    $title = substr($faker->sentence(2), 0, -1);

    return [
        'user_id' => $randomUser->id,
        'title' => $title,
        'slug' => substr(sha1(microtime()), 0, 10).'-'.Str::slug($title),
        'url' => 'https://www.google.com',
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
