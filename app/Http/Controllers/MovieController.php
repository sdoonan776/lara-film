<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Services\GenreService;
use App\Services\RestApiService;
use Illuminate\View\View;

class MovieController extends Controller
{
    protected $restApiService;
    protected $genreService;

    public function __construct(
        RestApiService $restApiService,
        GenreService $genreService
    )
    {
        $this->restApiService = $restApiService;
        $this->genreService = $genreService;
    }

    /**
     * Display all listings of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $recentMovies = $this->restApiService->getRecentMovies()['results'];
        $popularMovies = $this->restApiService->getPopularMovies()['results'];
        $imageUrl = $this->restApiService->getConfiguration()['images']['base_url'];
        $backdropImageSize = $this->restApiService->getConfiguration()['images']['backdrop_sizes'][3];
        $posterImageSize = $this->restApiService->getConfiguration()['images']['poster_sizes'][0];
        $genres = $this->genreService->getGenres()['genres'];

        return view('movie.index', [
            'recentMovies' => $recentMovies,
            'popularMovies' => $popularMovies,
            'imageUrl' => $imageUrl,
            'backdropImageSize' => $backdropImageSize,
            'posterImageSize' => $posterImageSize,
            'genres' => $genres
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
        try {
            $movie = $this->restApiService->getMovie($movieId);
            $credits = $this->restApiService->getMovieCredits($movieId);
            $images = $this->restApiService->getMovieImages($movieId);
            $imageUrl = $this->restApiService->getConfiguration()['images']['base_url'];
            $posterImageSize = $this->restApiService->getConfiguration()['images']['poster_sizes'][2];
            $backdropImageSize = $this->restApiService->getConfiguration()['images']['backdrop_sizes'][3];
            $profileImageSize = $this->restApiService->getConfiguration()['images']['profile_sizes'][0];

            $trailer = $this->restApiService->getTrailer($movieId)['results'][0]['key'];
        } catch (ApiException $e) {
            return [];
        }

        return view('movie.show', [
            'movie' => $movie,
            'credits' => $credits,
            'images' => $images,
            'imageUrl' => $imageUrl,
            'posterImageSize' => $posterImageSize,
            'backdropImageSize' => $backdropImageSize,
            'profileImageSize' => $profileImageSize,
            'trailer' => $trailer
        ]);
    }

}
