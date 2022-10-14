<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Exceptions\NotFoundException;
use App\Exceptions\ServerException;
use App\Models\Movie;
use App\Services\TMDB\ConfigService;
use App\Services\TMDB\GenreService;
use App\Services\TMDB\MovieService;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    /**
     * Returns main home page
     *
     * @return View
     * @throws ApiException
     * @throws NotFoundException
     * @throws ServerException
     */
    public function __invoke(): View
    {
        $recentMovies = Movie::all();
        $configs = json_decode(file_get_contents(base_path() . '/app/Utils/configs.json'), true);
//        $recentMovies = $this->movieService->getRecentMovies()['results'];
//        $upcomingMovies = $this->movieService->getUpcomingMovies();
//        $popularMovies = $this->movieService->getPopularMovies();
//        $topRatedMovies = $this->movieService->getTopRatedMovies();

        return view('pages.home', [
            'recentMovies' => $recentMovies,
//            'popularMovies' => $popularMovies,
//            'upcomingMovies' => $upcomingMovies,
//            'topRatedMovies' => $topRatedMovies,
            'configs' => $configs['images']
//            'imageUrl' => $this->configs['images']['base_url'],
//            'posterImageSize' => $this->configs['images']['poster_sizes'][2],
//            'backdropImageSize' => $this->configs['images']['backdrop_sizes'][3]
        ]);
    }
}
