<?php

namespace Database\Factories;

use App\Models\Problem;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProblemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Problem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(15),
            'problem_catagory_id' => \App\Models\ProblemCatagory::factory(),
        ];
    }
}
