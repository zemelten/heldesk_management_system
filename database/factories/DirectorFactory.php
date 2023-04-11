<?php

namespace Database\Factories;

use App\Models\Director;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DirectorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Director::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->name(),
            'sex' => \Arr::random(['male', 'female', 'other']),
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
