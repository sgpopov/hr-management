<?php

use App\DocumentTemplate;
use Illuminate\Database\Seeder;

class DocumentTempltesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DocumentTemplate::create([
            'title' => 'Candidate Rejection Letter Example',
            'content' => file_get_contents(__DIR__ . '/_data/documents-templates/candidate-rejection-letter.html')
        ]);

        DocumentTemplate::create([
            'title' => 'Welcome Letter Example',
            'content' => file_get_contents(__DIR__ . '/_data/documents-templates/welcome-letter.html')
        ]);
    }
}
