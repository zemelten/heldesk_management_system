<?php

namespace Database\Seeders;

use App\Models\Prioritie;
use Illuminate\Database\Seeder;

class PrioritieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prioritie::factory()
            ->count(5)
            ->create();
    }
}
