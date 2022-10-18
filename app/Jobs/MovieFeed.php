<?php

namespace App\Jobs;

use App\Services\TMDB\MovieService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MovieFeed implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        for ($i = 1; $i < 10; $i++) {
            $recentMovies = collect($this->movieService->getRecentMovies($i)['results']);
            $topRatedMovies = collect($this->movieService->getTopRatedMovies($i)['results']);
            $upcomingMovies = collect($this->movieService->getUpcomingMovies($i)['results']);
            foreach ($recentMovies as $movie) {
                $movie = $this->movieService->getMovie($movie['id']);
                MovieMapper::dispatch($movie);
            }
            foreach ($topRatedMovies as $movie) {
                $movie = $this->movieService->getMovie($movie['id']);
                MovieMapper::dispatch($movie);
            }
            foreach ($upcomingMovies as $movie) {
                $movie = $this->movieService->getMovie($movie['id']);
                MovieMapper::dispatch($movie);
            }
        }
    }
}
