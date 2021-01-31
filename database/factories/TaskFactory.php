<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Task;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(6, true),
        'subject' => $faker->text(100),
        'description' => $faker->text(100),
        'date' => $faker->datetime(),
        'creator_id' => $faker->randomNumber(),
    ];
});
