<?php

use App\Forum_Models\Thread;

use Faker\Generator as Faker;

$factory->define(Thread::class, function (Faker $faker) {
    return [
       'title' => $faker->sentence($nbWords = 8, $variableNbWords = true)
    ];
});
