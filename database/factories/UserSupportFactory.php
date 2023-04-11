<?php

namespace Database\Factories;

use App\Models\UserSupport;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserSupportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserSupport::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_type' => $this->faker->numberBetween(0, 127),
            'user_id' => \App\Models\User::factory(),
            'problem_catagory_id' => \App\Models\ProblemCatagory::factory(),
            'building_id' => \App\Models\Building::factory(),
            'service_unit_id' => \App\Models\ServiceUnit::factory(),
            'unit_id' => \App\Models\Unit::factory(),
        ];
    }
}
