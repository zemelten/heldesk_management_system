<?php

namespace Database\Factories;

use App\Models\Unit;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Unit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'telephone' => $this->faker->text(12),
            'fax' => $this->faker->text(12),
            'email' => $this->faker->email,
            'campuse_id' => \App\Models\Campus::factory(),
            'director_id' => \App\Models\Director::factory(),
        ];
    }
}
