<?php
namespace App\Http\Controllers\Api;

use App\Services\RestApiService;

class MovieController
{
    protected $restApiService;
    /**
     * Class constructor.
     */
    public function __construct(RestApiService $restApiService)
    {
        $this->restApiService = $restApiService;
    }

    /**
     * Returns an array of top rated movies
     *
     * @return RestApiService
     */
    public function getTopRatedMovies()
    {
        return $this->restApiService->getTopRatedMovies();
    }
    /**
     * returns configuration object
     *
     * @return RestApiService
     */
    public function getConfiguration()
    {
        return $this->restApiService->getConfiguration();
    }
}
