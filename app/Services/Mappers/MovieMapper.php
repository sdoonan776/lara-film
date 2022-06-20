<?php

namespace App\Services\Mappers;

use App\Jobs\CreateMovieJob;
use App\Services\TMDB\MovieService;

class MovieMapper {

    protected MovieService $movieService;

    public function __construct(MovieService $movieService) {
        $this->movieService = $movieService;
    }

    public function createMovie() {
        $movies = $this->movieService->getRecentMovies();
        dd($movies);
        dispatch(new CreateMovieJob($movies));
    }
}
