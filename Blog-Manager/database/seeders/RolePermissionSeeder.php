<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Création du rôle Administrateur
        $adminRole = Role::firstOrCreate(['name' => 'Administrateur']);

       
        $permissions = [
            'create posts',
            'edit posts',
            'delete posts',
            'manage users',
        ];

        foreach ($permissions as $permission) {
            $perm = Permission::firstOrCreate(['name' => $permission]);
            $adminRole->givePermissionTo($perm);
        }
    }
}
