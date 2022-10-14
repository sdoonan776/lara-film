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

    private MovieService $movieService;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(MovieService $movieService): void
    {
        $this->movieService = $movieService;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        for ($i = 1; $i < 10; $i++) {
            $movies = collect($this->movieService->getRecentMovies($i)['results']);
            foreach ($movies as $movie) {
                $movie = $this->movieService->getMovie($movie['id']);
                MovieMapper::dispatch($movie);
            }
        }
        for ($i = 1; $i < 10; $i++) {
            $movies = collect($this->movieService->getTopRatedMovies($i)['results']);
            foreach ($movies as $movie) {
                $movie = $this->movieService->getMovie($movie['id']);
                MovieMapper::dispatch($movie);
            }
        }
        for ($i = 1; $i < 10; $i++) {
            $movies = collect($this->movieService->getUpcomingMovies($i)['results']);
            foreach ($movies as $movie) {
                $movie = $this->movieService->getMovie($movie['id']);
                MovieMapper::dispatch($movie);
            }
        }
    }
}
