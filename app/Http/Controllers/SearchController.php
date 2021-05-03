<?php

namespace App\Http\Controllers;

use App\Services\GenreService;
use App\Services\RestApiService;
use App\Services\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $restApiService;
    protected $genreService;
    protected $searchService;

    public function __construct(
        RestApiService $restApiService,
        GenreService $genreService,
        SearchService $searchService
    )
    {
        $this->restApiService = $restApiService;
        $this->genreService = $genreService;
        $this->searchService = $searchService;
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $searches = $this->searchService->getMultiSearch($search)['results'];
        $popularMovies = $this->restApiService->getPopularMovies()['results'];
        $posterImageSize = $this->restApiService->getConfiguration()['images']['poster_sizes'][0];
        $backdropImageSize = $this->restApiService->getConfiguration()['images']['backdrop_sizes'][3];
        $imageUrl = $this->restApiService->getConfiguration()['images']['base_url'];

        return view('movie.search', [
            'imageUrl' => $imageUrl,
            'popularMovies' => $popularMovies,
            'posterImageSize' => $posterImageSize,
            'backdropImageSize' => $backdropImageSize,
            'search' => $search,
            'searches' => $searches
        ]);
    }
}
