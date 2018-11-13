<?php

use App\Forum_Models\Comment;

use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'parent_comment_id' => 0,
        'user_comment' => 'This is a comment!'
    ];
});
