<?php

namespace App\Services\TMDB;

use App\Exceptions\ApiException;
use App\Exceptions\NotFoundException;
use App\Exceptions\ServerException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Collection;

class GenreService extends BaseTmdbService
{

    /**
     * Returns an array of available genres
     *
     * @return Collection
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws NotFoundException
     * @throws ServerException
     * @throws ApiException
     */
    public function getGenres(): Collection
    {
        try {
            $response = $this->client->get('/3/genre/movie/list');
            return collect(json_decode($response->getBody()->getContents(), true)['genres']);
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
