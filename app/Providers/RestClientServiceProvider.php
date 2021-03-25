<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class RestClientServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Client::class, function () {
            return new Client(
                [
                    'base_uri' => 'https://api.themoviedb.org/3/',
                    'headers' => [
                        'Authorization' => "Bearer " . env('TMDB_API_KEY'),
                        'Access-Control-Allow-Origin' => '*',
                        'Accept' => 'application/json',
                    ]
                ]);
            }
        );   
    }
}
