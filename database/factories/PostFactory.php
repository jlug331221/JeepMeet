<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Thread;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'thread_id' => Thread::all()->random()->id,
            'title' => $this->faker->sentence(4),
            'content' => $this->faker->sentences(8, true),
            'likes' => $this->faker->numberBetween($min = 0, $max = 100),
            'created_at' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now'),
            'updated_at' => $this->faker->dateTimeBetween($startDate = '-1 month', $endDate = 'now'),
        ];
    }
}
