<?php
namespace App\Contracts;

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
     * Returns a single movie resource with a given Id
     *
     * @param $id
     * @return array
     */
    public function getMovie($id): array;

    /**
     * Returns a configuration object
     *
     * @return array
     */
    public function getConfiguration(): array;

    /**
     * Returns creates a rating based on a movie id
     *
     * @param int $id
     * @return Response
     */
    public function createRating(int $id): Response;
}
