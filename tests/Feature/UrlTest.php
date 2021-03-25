<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrlTest extends TestCase
{


    /**
    * @test
    * @dataProvider getPublicUrls() $data
    */
    public function it_should_return_a_200_status_code_for_public_urls($data)
    {
        $response = $this->get($data);
        $response->assertStatus(200);
    }

    public function getPublicUrls()
    {
        yield ['/'];
        // yield ['/movie'];
        // yield ['/film/2'];
        // yield ['/users/'];
        // yield ['//'];
    }

}
