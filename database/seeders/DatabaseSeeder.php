<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
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

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@site.com',
            'username' => 'admin',
            'password' => bcrypt('admin123'),
        ]);
        $user->assignRole('Admin');


        $user2 = User::create([
            'name' => 'Artist',
            'email' => 'artist@site.com',
            'username' => 'artist',
            'password' => bcrypt('artist123'),
        ]);
        
        $user2->assignRole('Artist');
    }
    

    
}