<?php

namespace Database\Factories;

use App\Models\Leader;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeaderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Leader::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->firstName,
            'sex' => \Arr::random(['male', 'female']),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'user_id' => \App\Models\User::factory(),
            'director_id' => \App\Models\Director::factory(),
        ];
    }
}
