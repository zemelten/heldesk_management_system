<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AssignedOrgUnit;

class AssignedOrgUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AssignedOrgUnit::factory()
            ->count(5)
            ->create();
    }
}
