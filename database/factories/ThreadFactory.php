<?php

use Faker\Generator as Faker;

$factory->define(App\Forum_Models\Thread::class, function (Faker $faker) {
    return [
       'title' => $faker->sentence($nbWords = 8, $variableNbWords = true)
    ];
});
