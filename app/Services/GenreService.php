<?php

namespace App\Services;

use App\Exceptions\TmdbException;
use App\Services\RestApiService;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class GenreService extends RestApiService
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Returns an array of available genres
     *
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getGenres()
    {
        try {
            $response = $this->client->request('GET', '/3/genre/movie/list');
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $exception) {
            switch ($exception->getResponse()->getStatusCode()) {
                case 404:
                    throw new NotFoundException($exception->getMessage());
                    break;
                case 500:
                    throw new ServerException($exception->getMessage());
                    break;
                default:
                    throw new ApiException($exception->getMessage());
                    break;
            }
        }
    }
}
