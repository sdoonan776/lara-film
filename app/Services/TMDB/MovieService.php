<?php

namespace App\Services\TMDB;

use App\Exceptions\ApiException;
use App\Exceptions\NotFoundException;
use App\Exceptions\ServerException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class MovieService extends BaseTmdbService
{
    /**
     * Returns an array of top rated movies
     *
     * @return Collection
     * @throws NotFoundException
     * @throws ApiException
     * @throws ServerException
     */

    public function getTopRatedMovies(): Collection
    {
        try {
            $response = $this->client->get('/3/movie/top_rated');
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

    /**
     * Returns an array of recently released movies
     *
     * @return Collection
     * @throws ApiException
     * @throws NotFoundException
     * @throws ServerException
     */
    public function getLatestMovies(): Collection
    {
        try {
            $response = $this->client->get('/3/movie/latest');
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

    /**
     * Returns an array of popular movies (updates daily)
     *
     * @return Collection
     */
    public function getPopularMovies(): Collection
    {
        try {
            $response = $this->client->get( '/3/movie/popular');
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

    /**
     * Returns an array of upcoming movies (updates daily)
     *
     * @return Collection
     * @throws NotFoundException
     * @throws ServerException
     * @throws ApiException
     */
    public function getUpcomingMovies(): Collection
    {
        try {
            $response = $this->client->get('/3/movie/upcoming');
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

    /**
     * Returns a single movie resource with a given Id
     *
     * @param string $movieId
     * @return Collection
     * @throws NotFoundException
     * @throws ServerException
     * @throws ApiException
     */
    public function getMovie(string $movieId): Collection
    {
        try {
            $response = $this->client->get( '/3/movie/' . $movieId);
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

    /**
     * Returns an array of movie credits with a given movie id
     *
     * @param string $movieId
     * @return Collection
     */
    public function getMovieCredits(string $movieId): Collection
    {
        try {
            $response = $this->client->get('/3/movie/' . $movieId . '/credits');
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

    /**
     * Returns an array of movie images with a given movie id
     *
     * @param string $movieId
     * @return Collection
     * @throws NotFoundException
     * @throws ServerException
     * @throws ApiException
     */
    public function getMovieImages(string $movieId): Collection
    {
        try {
            $response = $this->client->get('/3/movie/' . $movieId . '/images');
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


    /**
     * Returns the trailer associated with a movie
     *
     * @param string $movieId
     * @return Collection
     * @throws NotFoundException
     * @throws ServerException
     * @throws ApiException
     */
    public function getMovieTrailer(string $movieId): Collection
    {
        try {
            $response = $this->client->get('/3/movie/' . $movieId . '/videos');
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

    /**
     * Creates a rating on a specified movie id
     *
     * @param string $movieId
     * @return JsonResponse
     * @throws \Exception
     */
    public function createRating(string $movieId): JsonResponse
    {
        try {
            $response = $this->client->post('/3/movie/' . $movieId . '/rating');
        } catch (\Exception $e) {
            throw new \Exception;
        }

        return response()->json([
            'success' => 'Rating created successfully'
        ]);
    }

}
