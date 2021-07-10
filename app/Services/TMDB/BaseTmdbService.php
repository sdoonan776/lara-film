<?php

namespace App\Services\TMDB;

use GuzzleHttp\Client;

class BaseTmdbService
{
    protected $client;
    public function __construct(Client $client) {
        $this->client = $client;
    }
}
