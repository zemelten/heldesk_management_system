<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\AssignedOffice;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssignedOfficeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AssignedOffice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'office_no' => $this->faker->text(10),
            'building_id' => \App\Models\Building::factory(),
        ];
    }
}
