<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\OrganizationalUnit;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrganizationalUnitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrganizationalUnit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'offcie_no' => $this->faker->randomNumber(0),
            'campuse_id' => \App\Models\Campus::factory(),
            'building_id' => \App\Models\Building::factory(),
            'prioritie_id' => \App\Models\Prioritie::factory(),
        ];
    }
}
