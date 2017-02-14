<?php

use App\Employee;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 50;

        for ($i = 0; $i < $limit; $i += 1) {
            $employee = new Employee();
            $employee->first_name = $faker->firstName;
            $employee->family_name = $faker->lastName;
            $employee->fullname = $faker->name;
            $employee->email = $faker->unique()->email;
            $employee->hired_on = $faker->date();
            $employee->save();
        }
    }
}
