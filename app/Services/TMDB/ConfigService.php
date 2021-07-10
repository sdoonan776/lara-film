<?php


namespace App\Services\TMDB;


use App\Exceptions\ApiException;
use App\Exceptions\NotFoundException;
use App\Exceptions\ServerException;
use App\Exceptions\TmdbException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Collection;

class ConfigService extends BaseTmdbService
{

    /**
     * Returns a configuration object
     *
     * @return Collection
     * @throws ServerException
     * @throws NotFoundException
     * @throws ApiException
     */
    public function getConfiguration(): Collection
    {
        try {
            $response = $this->client->get('/3/configuration');
            return collect(json_decode($response->getBody()->getContents(), true));
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
