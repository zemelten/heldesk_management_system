<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'takele.kebede@students.ju.edu.et',
                'password' => \Hash::make('admin'),
            ]);
        $this->call(PermissionsSeeder::class);

        // $this->call(AssignedOfficeSeeder::class);
        // $this->call(AssignedOrgUnitSeeder::class);
        // $this->call(BuildingSeeder::class);
        // $this->call(CampusSeeder::class);
        // $this->call(CustomerSeeder::class);
        // $this->call(DirectorSeeder::class);
        // $this->call(EscalatedTicketSeeder::class);
        // $this->call(FloorSeeder::class);
        // $this->call(LeaderSeeder::class);
        // $this->call(OrganizationalUnitSeeder::class);
        // $this->call(PrioritieSeeder::class);
        // $this->call(ProblemSeeder::class);
        // $this->call(ProblemCatagorySeeder::class);
        // $this->call(QueueTypeSeeder::class);
        // $this->call(ReportsSeeder::class);
        // $this->call(ServiceUnitSeeder::class);
        // $this->call(TicketSeeder::class);
        // $this->call(UnitSeeder::class);
        // $this->call(UserSeeder::class);
        // $this->call(UserSupportSeeder::class);
    }
}
