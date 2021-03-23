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

    public function getTopRatedMovies()
    {
        $this->restApiService->getTopRatedMovies();
    }
}
