<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $adminRole = Role::where('name', 'super-admin')->first();
        $user =User::whereEmail('aboma.balcha@ju.edu.et')->first();
        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
