<?php

namespace App\Services\TMDB;

use App\Services\TMDB\BaseTmdbService;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Collection;

class SearchService extends BaseTmdbService
{

    /**
     * Returns an array of available genres
     *
     * @param string $query
     * @return Collection
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getMultiSearch(string $query = '')
    {
        try {
            $response = $this->client->get('/3/search/multi?query=' . $query);
            return collect(json_decode($response->getBody()->getContents(), true)['results']);
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
