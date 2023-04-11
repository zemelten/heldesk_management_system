<?php

namespace Database\Seeders;

use App\Models\ServiceUnit;
use Illuminate\Database\Seeder;

class ServiceUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceUnit::factory()
            ->count(5)
            ->create();
    }
}
