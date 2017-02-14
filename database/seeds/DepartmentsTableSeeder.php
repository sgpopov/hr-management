<?php

use App\Department;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();

        $departments = [
            [
                'name' => 'Operations Department',
                'manager_id' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Sales & Marketing Department',
                'manager_id' => 2,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Research & Development Department',
                'manager_id' => 3,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'IT Department',
                'manager_id' => 4,
                'created_at' => $date,
                'updated_at' => $date
            ]
        ];

        Department::insert($departments);
    }
}
