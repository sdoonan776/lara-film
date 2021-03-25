<?php
namespace App\Contracts;

interface RestApiServiceContract
{
    /**
     * Returns an array of top rated movies
     *
     * @return Response
     */
    public function getTopRatedMovies();

    /**
     * Returns a configuration object
     *
     * @return Response
     */
    public function getConfiguration();
}