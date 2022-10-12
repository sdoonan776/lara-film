<?php

namespace App\Services\TMDB;

use GuzzleHttp\Client;

class BaseTmdbService
{
    protected Client $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }
}
