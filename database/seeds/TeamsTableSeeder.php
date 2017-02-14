<?php

use App\Department;
use App\Team;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();

        $operationsDepartment = Department::where('name', '=', 'Operations Department')->first();
        $salesDepartment = Department::where('name', '=', 'Sales & Marketing Department')->first();
        $rdDepartment = Department::where('name', '=', 'Research & Development Department')->first();
        $itDepartment = Department::where('name', '=', 'IT Department')->first();

        $teams = [
            [
                'name' => 'Financial',
                'department_id' => $operationsDepartment->id,
                'manager_id' => rand(1, 20),
                'leader_id' => rand(1, 20),
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Human Resources',
                'department_id' => $operationsDepartment->id,
                'manager_id' => rand(1, 20),
                'leader_id' => rand(1, 20),
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Sales',
                'department_id' => $salesDepartment->id,
                'manager_id' => rand(1, 20),
                'leader_id' => rand(1, 20),
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Analytics',
                'department_id' => $rdDepartment->id,
                'manager_id' => rand(1, 20),
                'leader_id' => rand(1, 20),
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Product Development',
                'department_id' => $itDepartment->id,
                'manager_id' => rand(1, 20),
                'leader_id' => rand(1, 20),
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'UI/UX',
                'department_id' => $itDepartment->id,
                'manager_id' => rand(1, 20),
                'leader_id' => rand(1, 20),
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Quality Assurance',
                'department_id' => $itDepartment->id,
                'manager_id' => rand(1, 20),
                'leader_id' => rand(1, 20),
                'created_at' => $date,
                'updated_at' => $date
            ]
        ];

        Team::insert($teams);
    }
}
