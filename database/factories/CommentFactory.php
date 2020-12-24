<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'post_id' => Post::all()->random()->id,
            'comment' => $this->faker->sentences(5, true),
            'parent_id' => null,
            'created_at' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now'),
            'updated_at' => $this->faker->dateTimeThisYear($max = 'now'),
        ];
    }
}
