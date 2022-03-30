<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add admin role
        $role =  new Role();
        $role->name = "Admin";
        $role->slug = "admin";
        $role->save();

        // Add Owner
        $role = new Role();
        $role->name = "Owner";
        $role->slug = "owner";
        $role->save();

        // Add Manager
        $role = new Role();
        $role->name = "Managers";
        $role->slug = "managers";
        $role->save();

        // Add Team Lead
        $role = new Role();
        $role->name = "Team Lead";
        $role->slug = "team_lead";
        $role->save();

        // Add Employees
        $role = new Role();
        $role->name = "Employees";
        $role->slug = "employees";
        $role->save();
    }
}
