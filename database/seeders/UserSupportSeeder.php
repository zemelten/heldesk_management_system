<?php

namespace Database\Seeders;

use App\Models\UserSupport;
use Illuminate\Database\Seeder;

class UserSupportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserSupport::factory()
            ->count(5)
            ->create();
    }
}
