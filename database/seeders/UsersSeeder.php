<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        $user = new User();
        $user->name = "Admin";
        $user->email = "admin@trial.com";
        $user->password  = bcrypt("Admin123#");
        if ($user->save()) {
            $user->roles()->attach(1);
        }

        // Manager
        $user = new User();
        $user->name = "Owners";
        $user->email = "owner@trial.com";
        $user->password  = bcrypt("Admin123#");
        if ($user->save()) {
            $user->roles()->attach(2);
        }

        $user = new User();
        $user->name = "Managers";
        $user->email = "manager@trial.com";
        $user->password  = bcrypt("Admin123#");
        if ($user->save()) {
            $user->roles()->attach(3);
        }


        $user = new User();
        $user->name = "Team Lead";
        $user->email = "team_lead@trial.com";
        $user->password  = bcrypt("Admin123#");
        if ($user->save()) {
            $user->roles()->attach(4);
        }

        $user = new User();
        $user->name = "Employee";
        $user->email = "employee@trial.com";
        $user->password  = bcrypt("Admin123#");
        if ($user->save()) {
            $user->roles()->attach(5);
        }
    }
}
