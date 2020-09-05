<?php

use App\Forum_Models\Comment;
use App\Forum_Models\Post;
use App\User;
use Faker\Generator as Faker;


$factory->define(Comment::class, function(Faker $faker) {
  return [
    'user_id' => User::all()->random()->id,
    'post_id' => Post::all()->random()->id,
    'title' => $faker->sentence(4),
    'content' => $faker->sentences(8, true),
    'created_at' => now(),
    'updated_at' => now()
  ];
});
