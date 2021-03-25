<?php

namespace Tests\Unit;

use GuzzleHttp\Client;
use Tests\TmdbApiTestCase;
use PHPUnit\Framework\TestCase;

class RestApiServiceTest extends TmdbApiTestCase
{
    protected $client;

    protected function setUp(): void
    {
        parent::setUp();
    
        $this->client = new Client(
            [
                'base_uri' => 'https://api.themoviedb.org',
                'headers' => [
                    'Authorization' => "Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxMDljNjVhOGE5Mjk3OWY2YThjMWY2ZmQ2NzczMWE5NyIsInN1YiI6IjVlYjczNmU0YmJlMWRkMDAyMjgwZjdiOCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.MKcTyJ_WqF5eekbSwwWJAcrJGUihwxtLmNF5NNufg3w",
                    'Access-Control-Allow-Origin' => '*',
                    'Accept' => 'application/json',
                ]
            ]
        );
    }
    
    /**
     * A basic unit test example.
     *
     * @test
     * @return void
     */
    public function returns_a_200_response_code_from_querying_top_rated_movies_from_api()
    {
        $this->client->get('/3/movie/top_rated');
        // $this->assertStatus(200);
    }

    public function asserts_true_from_checking_if_results_array_exists_in_response_object()
    {
        $response = $this->client->request('GET', '/movie/top_rated');
        $response->assertStatus(200);
    }
}
