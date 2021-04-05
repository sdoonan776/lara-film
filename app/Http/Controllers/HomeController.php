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
        $movies = $this->restApiService->getRecentMovies()['results'];
        $imageUrl = $this->restApiService->getConfiguration()['images']['base_url'];
        $posterImageSize = $this->restApiService->getConfiguration()['images']['poster_sizes'][3];

        return view('pages.home', [
            'movies' => $movies,
            'imageUrl' => $imageUrl,
            'posterImageSize' => $posterImageSize
        ]);
    }
}
