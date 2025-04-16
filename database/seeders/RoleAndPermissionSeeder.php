<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);

        Permission::create(['name' => 'create-songs']);
        Permission::create(['name' => 'edit-songs']);
        Permission::create(['name' => 'delete-songs']);
        Permission::create(['name' => 'is_admin']);
        Permission::create(['name' => 'is_artist']);
        
        // Create roles and assign existing permissions
        $adminRole = Role::create(['name' => 'Admin']);
        $artistRole = Role::create(['name' => 'Artist']);

        $adminRole->givePermissionTo([
            'create-users',
            'edit-users',
            'delete-users',
            'create-songs',
            'edit-songs',
            'delete-songs',
            'is_admin',
            'is_artist',
        ]);

        $artistRole->givePermissionTo([
            'create-songs',
            'edit-songs',
            'delete-songs',
            'is_artist',
        ]);
    }
}