<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $this->call(RoleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(TeamsTableSeeder::class);

        Schema::enableForeignKeyConstraints();
    }
}
