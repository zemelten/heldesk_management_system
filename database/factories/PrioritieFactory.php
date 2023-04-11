<?php

namespace Database\Factories;

use App\Models\Prioritie;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrioritieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Prioritie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'response' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
        ];
    }
}
