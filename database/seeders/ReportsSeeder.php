<?php

namespace Database\Seeders;

use App\Models\Reports;
use Illuminate\Database\Seeder;

class ReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reports::factory()
            ->count(5)
            ->create();
    }
}
