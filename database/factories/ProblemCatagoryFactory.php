<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ProblemCatagory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProblemCatagoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProblemCatagory::class;

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
        ];
    }
}
