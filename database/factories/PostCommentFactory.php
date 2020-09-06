<?php

use App\User;
use App\Forum_Models\Post;
use App\Forum_Models\Comment;
use Faker\Generator as Faker;


$factory->define(Comment::class, function (Faker $faker) {
  return [
    'user_id' => User::all()->random()->id,
    'post_id' => Post::all()->random()->id,
    'comment' => $faker->sentences(5, true),
    'parent_id' => null,
    'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now'),
    'updated_at' => $faker->dateTimeThisYear($max = 'now'),
  ];
});
