<?php
namespace App\Services;

use GuzzleHttp\Client;
use App\Exceptions\ApiException;
use App\Exceptions\ServerException;
use App\Exceptions\NotFoundException;
use App\Contracts\RestApiServiceContract;
use GuzzleHttp\Exception\RequestException;

class RestApiService implements RestApiServiceContract
{
    protected $client;
    
    /**
     * Class constructor.
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Returns an array of top rated movies
     *
     * @return Response
     */
    public function getTopRatedMovies()
    {
        try {
            $response = $this->client->request('GET', '/3/movie/top_rated');
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
    
    
    /**
     * Returns a configuration object
     *
     * @return Response
     */
    public function getConfiguration()
    {
        try {
            $response = $this->client->request('GET', '/3/configuration');
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