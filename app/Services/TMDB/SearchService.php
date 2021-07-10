<?php

namespace App\Services;

use App\Services\RestApiService;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class SearchService extends RestApiService
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Returns an array of available genres
     *
     * @param string $query
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getMultiSearch(string $query = '')
    {
        try {
            $response = $this->client->request('GET', '/3/search/multi?query=' . $query);
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
