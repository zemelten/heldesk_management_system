<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => $this->faker->numberBetween(0, 127),
            'description' => $this->faker->sentence(15),
            'campuse_id' => \App\Models\Campus::factory(),
            'organizational_unit_id' => \App\Models\OrganizationalUnit::factory(),
            'problem_id' => \App\Models\Problem::factory(),
            'user_support_id' => \App\Models\UserSupport::factory(),
            'prioritie_id' => \App\Models\Prioritie::factory(),
            'customer_id' => \App\Models\Customer::factory(),
            'reports_id' => \App\Models\Reports::factory(),
        ];
    }
}
