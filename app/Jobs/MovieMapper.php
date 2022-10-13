<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MovieMapper implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Movie $movie;

    /**
     * Create a new job instance.
     *
     * @param Collection $movies
     */
    public function __construct(Collection $movies)
    {
        $this->movies = $movies;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        foreach ($this->movies as $movie) {
            Movie::create([
                'adult' => $movie['adult'],
                'backdrop_path' => $movie['backdrop_path'],
                'genre_ids' => $movie['genre_ids'],
                'belongs_to_collection' => $movie['belongs_to_collection'],
                'budget' => $movie['budget'],
                'homepage' => $movie['homepage'],
                'imdb_id' => $movie['imdb_id'],
                'movie_id' => $movie['id'],
                'original_language' => $movie['original_language'],
                'original_title' => $movie['original_title'],
                'overview' => $movie['overview'],
                'popularity' => $movie['popularity'],
                'poster_path' => $movie['poster_path'],
                'release_date' => $movie['release_date'],
                'revenue' => $movie['revenue'],
                'runtime' => $movie['runtime'],
                'spoken_languages' => $movie['spoken_languages'],
                'status' => $movie['status'],
                'tagline' => $movie['tagline'],
                'title' => $movie['title'],
                'video' => $movie['video'],
                'vote_average' => $movie['vote_average'],
                'vote_count' => $movie['vote_count']
            ]);
        }
    }
}
