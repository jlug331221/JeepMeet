<?php

namespace Database\Factories;

use App\Models\Thread;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThreadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Thread::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'title' => $this->faker->sentence(),
            'number_of_posts' => $this->faker->numberBetween($min = 1, $max = 100),
            'created_at' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now'),
            'updated_at' => $this->faker->dateTimeThisYear($max = 'now'),
        ];
    }
}
