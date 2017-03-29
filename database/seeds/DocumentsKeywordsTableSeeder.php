<?php

use App\DocumentsKeywords;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DocumentsKeywordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keywords = $this->getKeywords();

        DocumentsKeywords::insert($keywords);
    }

    /**
     * @return array
     */
    private function getKeywords()
    {
        $faker = Factory::create();

        $keywords = [
            // Company Information
            [
                'keyword' => '{company-name}',
                'description' => 'Company name',
                'type' => 'custom',
                'default_value' => $faker->company
            ],
            [
                'keyword' => '{company-VAT}',
                'description' => 'Company VAT identification number',
                'type' => 'custom',
                'default_value' => $faker->randomNumber()
            ],
            [
                'keyword' => '{company-address}',
                'description' => 'Адрес на компанията',
                'type' => 'custom',
                'default_value' => $faker->address
            ],

            // Manager Informatation
            [
                'keyword' => '{manager-name}',
                'description' => 'Manager name',
                'type' => 'custom',
                'default_value' => $faker->name
            ],

            // Employee Information
            [
                'keyword' => '{employee-hiredOn}',
                'description' => 'Дата на подписване на трудовия договор',
                'type' => 'employeeInfo',
                'default_value' => null
            ],
            [
                'keyword' => '{employee-agreementNumber}',
                'description' => 'Employee agreement number',
                'type' => 'employeeInfo',
                'default_value' => null
            ],
            [
                'keyword' => '{employee-fullname}',
                'description' => 'Employee\'s fullname',
                'type' => 'employeeInfo',
                'default_value' => null
            ],
            [
                'keyword' => '{employee-first_name}',
                'description' => 'Employee\'s first name',
                'type' => 'employeeInfo',
                'default_value' => null
            ],
            [
                'keyword' => '{employee-family_name}',
                'description' => 'Employee\'s family name',
                'type' => 'employeeInfo',
                'default_value' => null
            ],
            [
                'keyword' => '{employee-id-number}',
                'description' => 'Employee ID/Passport number',
                'type' => 'employeeInfo',
                'default_value' => null
            ],
            [
                'keyword' => '{employee-id-issue_date}',
                'description' => 'Employee ID/Passport issue date',
                'type' => 'employeeInfo',
                'default_value' => null
            ],
            [
                'keyword' => '{employee-id-issue_by}',
                'description' => 'Employee ID/Passport issue authority',
                'type' => 'employeeInfo',
                'default_value' => null
            ],
            [
                'keyword' => '{employee-id-valid_until}',
                'description' => 'Employee ID/Passport valid until',
                'type' => 'employeeInfo',
                'default_value' => null
            ],
            [
                'keyword' => '{employee-id-address}',
                'description' => 'Employee ID/Passport address',
                'type' => 'employeeInfo',
                'default_value' => null
            ],
            [
                'keyword' => '{employee-work-email}',
                'description' => 'Employee\'s work email address',
                'type' => 'employeeInfo',
                'default_value' => null
            ],
            [
                'keyword' => '{employee-phone}',
                'description' => 'Employee\'s phone number',
                'type' => 'employeeInfo',
                'default_value' => null
            ],

            // Annual Leaves
            [
                'keyword' => '{annualLeave-type}',
                'description' => 'Annual leave type',
                'type' => 'blank',
                'default_value' => null
            ],
            [
                'keyword' => '{annualLeave-from-date}',
                'description' => 'Annual leave date from',
                'type' => 'blank',
                'default_value' => null
            ],
            [
                'keyword' => '{annualLeave-to-date}',
                'description' => 'Annual leave date to',
                'type' => 'blank',
                'default_value' => null
            ],
            [
                'keyword' => '{annualLeave-days}',
                'description' => 'Annual leave days',
                'type' => 'blank',
                'default_value' => null
            ],

            // Other
            [
                'keyword' => '{annex-number}',
                'description' => 'Annex number',
                'type' => 'autoId',
                'default_value' => null
            ],
            [
                'keyword' => '{date}',
                'description' => 'Current date',
                'type' => 'currentDate',
                'default_value' => null
            ]
        ];

        $keywords = array_map(function ($keyword) {
            $time = Carbon::now();

            $keyword['created_at'] = $time;
            $keyword['updated_at'] = $time;

            return $keyword;
        }, $keywords);

        return $keywords;
    }
}
