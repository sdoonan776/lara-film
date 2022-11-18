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
     */
    public function __invoke(): View
    {
        $movies = Movie::all();
        $configs = json_decode(file_get_contents(base_path() . '/app/Utils/configs.json'), true);

        return view('pages.home', [
            'recentMovies' => $movies->sortBy('created_at')->splice(0, 10),
            // 'upcomingMovies' => $movies->sortBy,
            'topRatedMovies' => $movies,
            'configs' => $configs['images']
        ]);
    }
}
