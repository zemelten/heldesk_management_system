<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->name(),
            'email' => $this->faker->email,
            'phone_no' => $this->faker->phoneNumber,
            'is_edited' => $this->faker->numberBetween(0, 127),
            'office_num' => $this->faker->text(5),
            'building_id' => \App\Models\Building::factory(),
            'campus_id' => \App\Models\Campus::factory(),
            'organizational_unit_id' => \App\Models\OrganizationalUnit::factory(),
            'floor_id' => \App\Models\Floor::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
