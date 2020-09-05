<?php

use App\Forum_Models\Thread;
use App\User;
use Faker\Generator as Faker;


$factory->define(Thread::class, function (Faker $faker) {
  return [
    'user_id' => User::all()->random()->id,
    'title' => $faker->sentence(),
    'created_at' => now(),
    'updated_at' => now(),
  ];
});
