<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RolePermission;

class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create admin role permissions
        $user_permission = new RolePermission();
        $user_permission->role_id = 1;
        $user_permission->permission_id = 1;
        $user_permission->save();

        //create Owners Roles Permissions
        $user_permission = new RolePermission();
        $user_permission->role_id = 2;
        $user_permission->permission_id=1;
        $user_permission->save();


        //create Managers Roles Permissions
        $user_permission = new RolePermission();
        $user_permission->role_id = 3;
        $user_permission->permission_id=4;
        $user_permission->save();
        $user_permission = new RolePermission();
        $user_permission->role_id = 3;
        $user_permission->permission_id=9;
        $user_permission->save();

        //Add Team Leads Permissions
        $user_permission= new RolePermission();
        $user_permission->role_id = 4;
        $user_permission->permission_id=6;
        $user_permission->save();
        $user_permission= new RolePermission();
        $user_permission->role_id = 4;
        $user_permission->permission_id=7;
        $user_permission->save();
        $user_permission= new RolePermission();
        $user_permission->role_id = 4;
        $user_permission->permission_id=8;
        $user_permission->save();
        $user_permission= new RolePermission();
        $user_permission->role_id = 4;
        $user_permission->permission_id=9;
        $user_permission->save();


        // Add Employees Permission
        $user_permission = new RolePermission();
        $user_permission->role_id = 5;
        $user_permission->permission_id = 6;
        $user_permission->save();
        $user_permission = new RolePermission();
        $user_permission->role_id = 5;
        $user_permission->permission_id = 9;
        $user_permission->save();

    }
}
