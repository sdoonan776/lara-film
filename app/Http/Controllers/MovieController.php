<?php

namespace App\Http\Controllers;

use App\Services\RestApiService;
use Illuminate\View\View;

class MovieController extends Controller
{
    protected $restApiService;

    public function __construct(RestApiService $restApiService)
    {
        $this->restApiService = $restApiService;
    }

    /**
     * Display all listings of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $movies = $this->restApiService->getTopRatedMovies()['results'];
        $imageUrl = $this->restApiService->getConfiguration()['images']['base_url'];
        $posterImageSize = $this->restApiService->getConfiguration()['images']['poster_sizes'][2];

        return view('movie.index', [
            'movies' => $movies,
            'imageUrl' => $imageUrl,
            'posterImageSize' => $posterImageSize
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param $movieId
     * @return View
     */
    public function show($movieId): View
    {
        $movie = $this->restApiService->getMovie($movieId);
        $imageUrl = $this->restApiService->getConfiguration()['images']['base_url'];
        $posterImageSize = $this->restApiService->getConfiguration()['images']['poster_sizes'][2];
        $trailer = $this->restApiService->getTrailer($movieId)['results'][0]['key'];

        return view('movie.show', [
            'movie' => $movie,
            'imageUrl' => $imageUrl,
            'posterImageSize' => $posterImageSize,
            'trailer' => $trailer
        ]);
    }

}
