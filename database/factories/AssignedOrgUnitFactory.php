<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\AssignedOrgUnit;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssignedOrgUnitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AssignedOrgUnit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'assigned_office_id' => \App\Models\AssignedOffice::factory(),
            'organizational_unit_id' => \App\Models\OrganizationalUnit::factory(),
        ];
    }
}
