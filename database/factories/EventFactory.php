<?php

use App\Modules\Event\Event;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Carbon\Carbon;

$factory->define(Event::class, function (Faker $faker) {
    $start_date = Carbon::now()->addDays($faker->randomElement([1,2,3,4,5,6,7,8,9]));
    $end_date = $start_date->copy()->addDays($faker->randomElement([1,2,3,4,5,6,7,8,9]));
    $title = $faker->sentence(3);

    return [
        'title' => $title,
        'slug' => Str::slug($title) . '-' . uniqid(time()),
        'description' => $faker->paragraph($faker->numberBetween(2, 10)),
        'address' => $faker->address,
        'lat' => $faker->latitude,
        'long' => $faker->longitude,
        'start_date' => $start_date->format('Y-m-d'),
        'end_date' => $end_date->format('Y-m-d'),
        'user_id' => User::all()->random()->id,
    ];
});
