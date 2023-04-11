<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list assignedoffices']);
        Permission::create(['name' => 'view assignedoffices']);
        Permission::create(['name' => 'create assignedoffices']);
        Permission::create(['name' => 'update assignedoffices']);
        Permission::create(['name' => 'delete assignedoffices']);

        Permission::create(['name' => 'list assignedorgunits']);
        Permission::create(['name' => 'view assignedorgunits']);
        Permission::create(['name' => 'create assignedorgunits']);
        Permission::create(['name' => 'update assignedorgunits']);
        Permission::create(['name' => 'delete assignedorgunits']);

        Permission::create(['name' => 'list buildings']);
        Permission::create(['name' => 'view buildings']);
        Permission::create(['name' => 'create buildings']);
        Permission::create(['name' => 'update buildings']);
        Permission::create(['name' => 'delete buildings']);

        Permission::create(['name' => 'list campuses']);
        Permission::create(['name' => 'view campuses']);
        Permission::create(['name' => 'create campuses']);
        Permission::create(['name' => 'update campuses']);
        Permission::create(['name' => 'delete campuses']);

        Permission::create(['name' => 'list customers']);
        Permission::create(['name' => 'view customers']);
        Permission::create(['name' => 'create customers']);
        Permission::create(['name' => 'update customers']);
        Permission::create(['name' => 'delete customers']);

        Permission::create(['name' => 'list directors']);
        Permission::create(['name' => 'view directors']);
        Permission::create(['name' => 'create directors']);
        Permission::create(['name' => 'update directors']);
        Permission::create(['name' => 'delete directors']);

        Permission::create(['name' => 'list floors']);
        Permission::create(['name' => 'view floors']);
        Permission::create(['name' => 'create floors']);
        Permission::create(['name' => 'update floors']);
        Permission::create(['name' => 'delete floors']);

        Permission::create(['name' => 'list leaders']);
        Permission::create(['name' => 'view leaders']);
        Permission::create(['name' => 'create leaders']);
        Permission::create(['name' => 'update leaders']);
        Permission::create(['name' => 'delete leaders']);

        Permission::create(['name' => 'list organizationalunits']);
        Permission::create(['name' => 'view organizationalunits']);
        Permission::create(['name' => 'create organizationalunits']);
        Permission::create(['name' => 'update organizationalunits']);
        Permission::create(['name' => 'delete organizationalunits']);

        Permission::create(['name' => 'list priorities']);
        Permission::create(['name' => 'view priorities']);
        Permission::create(['name' => 'create priorities']);
        Permission::create(['name' => 'update priorities']);
        Permission::create(['name' => 'delete priorities']);

        Permission::create(['name' => 'list problems']);
        Permission::create(['name' => 'view problems']);
        Permission::create(['name' => 'create problems']);
        Permission::create(['name' => 'update problems']);
        Permission::create(['name' => 'delete problems']);

        Permission::create(['name' => 'list problemcatagories']);
        Permission::create(['name' => 'view problemcatagories']);
        Permission::create(['name' => 'create problemcatagories']);
        Permission::create(['name' => 'update problemcatagories']);
        Permission::create(['name' => 'delete problemcatagories']);

        Permission::create(['name' => 'list serviceunits']);
        Permission::create(['name' => 'view serviceunits']);
        Permission::create(['name' => 'create serviceunits']);
        Permission::create(['name' => 'update serviceunits']);
        Permission::create(['name' => 'delete serviceunits']);

        Permission::create(['name' => 'list tickets']);
        Permission::create(['name' => 'view tickets']);
        Permission::create(['name' => 'create tickets']);
        Permission::create(['name' => 'update tickets']);
        Permission::create(['name' => 'delete tickets']);

        Permission::create(['name' => 'list units']);
        Permission::create(['name' => 'view units']);
        Permission::create(['name' => 'create units']);
        Permission::create(['name' => 'update units']);
        Permission::create(['name' => 'delete units']);

        Permission::create(['name' => 'list usersupports']);
        Permission::create(['name' => 'view usersupports']);
        Permission::create(['name' => 'create usersupports']);
        Permission::create(['name' => 'update usersupports']);
        Permission::create(['name' => 'delete usersupports']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
