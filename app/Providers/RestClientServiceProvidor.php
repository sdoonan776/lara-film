<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class RestClientServiceProvidor extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Client::class, function ($app) {
            return new Client('
                'url' => 'https://https://api.themoviedb.org/3',
                'Authentication' => 'Bearer',
            ')
 11       });
    }
}
