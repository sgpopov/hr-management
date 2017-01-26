<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'employee';
        $role->save();

        $role = new Role();
        $role->name = 'leader';
        $role->save();

        $role = new Role();
        $role->name = 'accountant';
        $role->save();

        $role = new Role();
        $role->name = 'manager';
        $role->save();

        $role = new Role();
        $role->name = 'admin';
        $role->save();
    }
}
