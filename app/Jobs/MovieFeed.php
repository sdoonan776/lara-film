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

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(MovieService $movieService): void
    {
        for ($i = 1; $i < 10; $i++) {
            $recentMovies = collect($movieService->getRecentMovies($i)['results']);
            $topRatedMovies = collect($movieService->getTopRatedMovies($i)['results']);
            $upcomingMovies = collect($movieService->getUpcomingMovies($i)['results']);
            foreach ($recentMovies as $movie) {
                $movie = $movieService->getMovie($movie['id']);
                MovieMapper::dispatch($movie);
                echo $movie['title'] . "has successfully been imported" . "<br/><br/>";
            }
            foreach ($topRatedMovies as $movie) {
                $movie = $movieService->getMovie($movie['id']);
                MovieMapper::dispatch($movie);
                echo $movie['title'] . "has successfully been imported" . "<br/><br/>";
            }
            foreach ($upcomingMovies as $movie) {
                $movie = $movieService->getMovie($movie['id']);
                MovieMapper::dispatch($movie);
                echo $movie['title'] . "has successfully been imported" . "<br/><br/>";
            }
            }
        }
    }
}
