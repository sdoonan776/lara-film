<?php
namespace App\Contracts;

use App\Exceptions\TmdbException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Response;

interface RestApiServiceContract
{
    /**
     * Returns an array of top rated movies
     *
     * @return array
     */
    public function getTopRatedMovies(): array;

    /**
     * Returns an array of recently released movies
     *
     * @return array
     */
    public function getRecentMovies(): array;

    /**
     * Returns an array of popular movies (updates daily)
     *
     * @return array
     */
    public function getPopularMovies(): array;

    /**
     * Returns an array of upcoming movies (updates daily)
     *
     * @return array
     */
    public function getUpcomingMovies(): array;

    /**
     * Returns a single movie resource with a given Id
     *
     * @param $id
     * @return array
     */
    public function getMovie($id): array;

    /**
     * Returns an array of movie credits with a given movie id
     *
     * @param $id
     * @return array
     */
    public function getMovieCredits($id): array;

    /**
     * Returns an array of movie images with a given movie id
     *
     * @param $id
     * @return array
     */
    public function getMovieImages($id): array;

    /**
     * Returns a configuration object
     *
     * @return array
     */
    public function getConfiguration(): array;

    /**
     * Returns the trailer associated with a movie
     *
     * @param $id
     * @return mixed
     */
    public function getTrailer($id);

    /**
     * Returns creates a rating based on a movie id
     *
     * @param int $id
     * @return Response
     */
    public function createRating(int $id): Response;
}
