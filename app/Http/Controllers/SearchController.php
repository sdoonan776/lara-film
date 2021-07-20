<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Services\TMDB\ConfigService;
use App\Services\TMDB\GenreService;
use App\Services\TMDB\MovieService;
use App\Services\TMDB\SearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class SearchController extends Controller
{
    protected $movieService;
    protected $genreService;
    protected $searchService;
    protected $configService;

    public function __construct(
        MovieService $movieService,
        GenreService $genreService,
        SearchService $searchService,
        ConfigService $configService
    )
    {
        $this->movieService = $movieService;
        $this->genreService = $genreService;
        $this->searchService = $searchService;
        $this->configService = $configService;
    }

    /**
     * Handles the
     * @param Request $request
     * @return View
     */
    public function search(Request $request): Collection
    {
        try {
            $search = $request->get('search');
            $searches = $this->searchService->getMultiSearch($search)['results'];
            $popularMovies = $this->movieService->getPopularMovies()['results'];
            $posterImageSize = $this->movieService->getConfiguration()['images']['poster_sizes'][0];
            $backdropImageSize = $this->movieService->getConfiguration()['images']['backdrop_sizes'][3];
            $imageUrl = $this->configService->getConfiguration()['images']['base_url'];
        } catch (ApiException $e) {
            return collect([]);
        }

//        return view('movie.search', [
//            'imageUrl' => $imageUrl,
//            'popularMovies' => $popularMovies,
//            'posterImageSize' => $posterImageSize,
//            'backdropImageSize' => $backdropImageSize,
//            'search' => $search,
//            'searches' => $searches
//        ]);
    }
}
