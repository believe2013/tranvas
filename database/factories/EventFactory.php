<?php

use App\Modules\Event\Event;
use App\User;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    $start_date = \Carbon\Carbon::now()->addDays($faker->randomElement([1,2,3,4,5,6,7,8,9]));
    $end_date = $start_date->copy()->addDays($faker->randomElement([1,2,3,4,5,6,7,8,9]));

    return [
        'title' => $faker->sentence(3),
        'description' => $faker->paragraph(5),
        'address' => $faker->address,
        'lat' => $faker->latitude,
        'long' => $faker->longitude,
        'start_date' => $start_date->format('Y-m-d'),
        'end_date' => $end_date->format('Y-m-d'),
        'user_id' => User::all()->random()->id,
    ];
});
