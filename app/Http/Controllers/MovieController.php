<?php

namespace App\Http\Controllers;

use App\Services\TMDB\ConfigService;
use App\Services\TMDB\GenreService;
use App\Services\TMDB\MovieService;
use Illuminate\View\View;

class MovieController extends Controller
{
    protected $movieService;
    protected $genreService;
    protected $configService;

    public function __construct(
        MovieService $movieService,
        GenreService $genreService,
        ConfigService $configService
    )
    {
        $this->movieService = $movieService;
        $this->genreService = $genreService;
        $this->configService = $configService;
    }

    /**
     * Display all listings of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $recentMovies = $this->movieService->getRecentMovies()['results'];
        $popularMovies = $this->movieService->getPopularMovies();
        $imageConfig = $this->configService->getConfiguration();
        $genres = $this->genreService->getGenres()['genres'];

        return view('movie.index', [
            'recentMovies' => $recentMovies,
            'popularMovies' => $popularMovies,
            'imageUrl' => $imageConfig['images']['base_url'],
            'backdropImageSize' => $imageConfig['images']['backdrop_sizes'][3],
            'posterImageSize' => $imageConfig['images']['poster_sizes'][0],
            'genres' => $genres
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param string $movieId
     * @return View
     */
    public function show(string $movieId): View
    {
        $movie = $this->movieService->getMovie($movieId);
        $credits = $this->movieService->getMovieCredits($movieId);
        $images = $this->movieService->getMovieImages($movieId);
        $imageConfig = $this->configService->getConfiguration();
        $trailer = $this->movieService->getMovieTrailer($movieId)[0]['key'];

        return view('movie.show', [
            'movie' => $movie,
            'credits' => $credits,
            'images' => $images,
            'imageUrl' => $imageConfig['images']['base_url'],
            'posterImageSize' => $imageConfig['images']['poster_sizes'][2],
            'backdropImageSize' => $imageConfig['images']['backdrop_sizes'][3],
            'profileImageSize' => $imageConfig['images']['profile_sizes'][0],
            'trailer' => $trailer
        ]);
    }

    /**
     * Returns the dates view for a specified movie id
     * @param string $movieId
     * @return View
     */
    public function dates(string $movieId): View
    {
        $movie = $this->movieService->getMovie($movieId);
        return view('movie.dates', [
            'movie' => $movie
        ]);
    }

}
