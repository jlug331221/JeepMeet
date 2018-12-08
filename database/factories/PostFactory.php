<?php

use App\Forum_Models\Post;

use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 8, $variableNbWords = true),
        'content' => $faker->paragraphs(rand(2, 10), true)
    ];
});
