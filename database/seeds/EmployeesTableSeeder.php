<?php

use App\Employee;
use Carbon\Carbon;
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
            $employee = Employee::create([
                'first_name' => $faker->firstName,
                'family_name' => $faker->lastName,
                'fullname' => $faker->name,
                'email' => $faker->unique()->email,
                'hired_on' => $faker->date(),
                'team_id' => rand(1, 7)
            ]);

            $employee->passport()->create([
                'number' => $faker->creditCardNumber,
                'issue_by' => $faker->country,
                'issue_date' => $faker->dateTimeBetween('-5 years', $endDate = 'now')->format('Y-m-d'),
                'valid_until' => $faker->dateTimeBetween('now', $endDate = '+5 years')->format('Y-m-d'),
                'address' => $faker->address,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
