<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // All Permission
        $permission = new Permission();
        $permission->name  = "All";
        $permission->slug = "all";
        $permission->save();

        //Add User permission
        $permission = new Permission();
        $permission->name  = "Add User";
        $permission->slug = "add-user";
        $permission->save();

        //Edit User Permission
        $permission = new Permission();
        $permission->name = "Edit User";
        $permission->slug = "edit-user";
        $permission->save();

        //View user permission
        $permission = new Permission();
        $permission->name = "View User";
        $permission->slug = "view-user";
        $permission->save();


        //Delete Permission
        $permission =  new Permission();
        $permission->name = "Delete User";
        $permission->slug = "delete-user";
        $permission->save();

        //Add Post Permission
        $permission = new Permission();
        $permission->name  = "Add Post";
        $permission->slug = "add-post";
        $permission->save();

        // Edit Post Permission
        $permission = new Permission();
        $permission->name  = "Edit Post";
        $permission->slug = "edit-post";
        $permission->save();

        // Delete Post Permission
        $permission = new Permission();
        $permission->name  = "Delete Post";
        $permission->slug = "delete-post";
        $permission->save();

        // View Post Permission
        $permission = new Permission();
        $permission->name  = "View Post";
        $permission->slug = "view-post";
        $permission->save();


        // View Roles
        $permission = new Permission();
        $permission->name  = "View Roles";
        $permission->slug = "view-roles";
        $permission->save();

        //View Permissions
        $permission = new Permission();
        $permission->name  = "View Permissions";
        $permission->slug = "view-permissions";
        $permission->save();


    }
}
