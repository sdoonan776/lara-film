<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Exceptions\NotFoundException;
use App\Exceptions\ServerException;
use Illuminate\View\View;
use App\Services\RestApiService;
use App\Http\Controllers\Controller;

class HomeController extends Controller
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
     * Returns main home page
     *
     * @return View
     */
    public function __invoke()
    {
        try {
            $recentMovies = $this->restApiService->getRecentMovies()['results'];
            $upcomingMovies = $this->restApiService->getUpcomingMovies()['results'];
            $popularMovies = $this->restApiService->getPopularMovies()['results'];
            $topRatedMovies = $this->restApiService->getTopRatedMovies()['results'];
            $imageUrl = $this->restApiService->getConfiguration()['images']['base_url'];
            $posterImageSize = $this->restApiService->getConfiguration()['images']['poster_sizes'][2];
            $backdropImageSize = $this->restApiService->getConfiguration()['images']['backdrop_sizes'][3];
        } catch (ApiException $e) {
            console.log($e);
        }

        return view('pages.home', [
            'recentMovies' => $recentMovies,
            'popularMovies' => $popularMovies,
            'upcomingMovies' => $upcomingMovies,
            'topRatedMovies' => $topRatedMovies,
            'imageUrl' => $imageUrl,
            'posterImageSize' => $posterImageSize,
            'backdropImageSize' => $backdropImageSize
        ]);
    }
}
