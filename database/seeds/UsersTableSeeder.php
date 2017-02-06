<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::where('name', 'admin')->first();
        $roleManager = Role::where('name', 'manager')->first();
        $roleEmployee = Role::where('name', 'employee')->first();

        $user = new User();
        $user->name = 'Svilen Popov';
        $user->email = 'demo@example.com';
        $user->password = bcrypt('svil4ok');
        $user->save();
        $user->assignRole($roleAdmin);

        $user = new User();
        $user->name = 'Scott';
        $user->email = 'scott@example.com';
        $user->password = bcrypt('scott');
        $user->save();
        $user->assignRole($roleManager);

        $user = new User();
        $user->name = 'Jeffrey';
        $user->email = 'jeffrey@example.com';
        $user->password = bcrypt('jeffrey');
        $user->save();
        $user->assignRole($roleEmployee);
    }
}
