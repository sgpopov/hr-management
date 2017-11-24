<?php

namespace Tests\Feature;

use App\Documents;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DocumentsTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function it_should()
    {
        $documents = factory(Documents::class, 10);

        $this->get('/documents');
    }
}
