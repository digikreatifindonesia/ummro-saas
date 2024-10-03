<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Buat beberapa role
//        $role1 = Role::create(['name' => 'admin']);
//        $role2 = Role::create(['name' => 'user']);
//        $role2 = Role::create(['name' => 'tenant']);
//
//        // Buat beberapa permission
//        $permission1 = Permission::create(['name' => 'edit articles']);
//        $permission2 = Permission::create(['name' => 'delete articles']);
//
//        // Assign permission ke role
//        $role1->givePermissionTo([$permission1, $permission2]);
//        $role2->givePermissionTo($permission1);
    }
}
