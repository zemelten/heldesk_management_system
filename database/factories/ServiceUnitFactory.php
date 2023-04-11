<?php

namespace Database\Factories;

use App\Models\ServiceUnit;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceUnitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServiceUnit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'telephone' => $this->faker->text(12),
            'fax' => $this->faker->randomNumber,
            'email' => $this->faker->email,
            'discription' => $this->faker->text,
            'unit_id' => \App\Models\Unit::factory(),
            'leader_id' => \App\Models\Leader::factory(),
        ];
    }
}
