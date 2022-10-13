<?php

namespace App\Http\Controllers;

use App\Services\TMDB\ConfigService;
use App\Services\TMDB\GenreService;
use App\Services\TMDB\MovieService;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $movieService;
    protected $configService;

    public function __construct(
        MovieService $movieService,
        ConfigService $configService
    )
    {
        $this->movieService = $movieService;
        $this->configService = $configService;
    }
    /**
     * Returns main home page
     *
     * @return View
     */
    public function __invoke()
    {
        $recentMovies = $this->movieService->getRecentMovies()['results'];
        $upcomingMovies = $this->movieService->getUpcomingMovies();
        $popularMovies = $this->movieService->getPopularMovies();
        $topRatedMovies = $this->movieService->getTopRatedMovies();
        $imageConfig = $this->configService->getConfiguration();

        return view('pages.home', [
            'recentMovies' => $recentMovies,
            'popularMovies' => $popularMovies,
            'upcomingMovies' => $upcomingMovies,
            'topRatedMovies' => $topRatedMovies,
            'imageUrl' => $imageConfig['images']['base_url'],
            'posterImageSize' => $imageConfig['images']['poster_sizes'][2],
            'backdropImageSize' => $imageConfig['images']['backdrop_sizes'][3]
        ]);
    }
}
