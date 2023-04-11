<?php

namespace Database\Seeders;

use App\Models\AssignedOffice;
use Illuminate\Database\Seeder;

class AssignedOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AssignedOffice::factory()
            ->count(5)
            ->create();
    }
}
