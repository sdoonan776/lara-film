<?php
namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Http\Response;
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
     * @return array
     * @throws NotFoundException
     */
    public function getTopRatedMovies(): array
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
     * Returns an array of recently released movies
     *
     * @return array
     */
    public function getRecentMovies(): array
    {
        try {
            $response = $this->client->request('GET', '/3/movie/now_playing');
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
     * Returns a single movie resource with a given Id
     *
     * @param $id
     * @return array
     */
    public function getMovie($id): array
    {
        try {
            $response = $this->client->request('GET', '/3/movie/' . $id);
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
     * @return array
     */
    public function getConfiguration(): array
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

    /**
     * Returns a configuration object
     *
     * @param $id
     * @return Response
     */
    public function createRating($id): Response
    {
        try {
            $response = $this->client->post('/3/movie/' . $id . '/rating');
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
