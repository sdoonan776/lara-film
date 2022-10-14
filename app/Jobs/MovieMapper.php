<?php

namespace App\Jobs;

use App\Models\Movie;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class MovieMapper implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Collection $movie;

    /**
     * Create a new job instance.
     *
     * @param Collection $movie
     */
    public function __construct(Collection $movie)
    {
        $this->movie = $movie;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        Movie::create([
            'adult' => $this->movie['adult'],
            'backdrop_path' => $this->movie['backdrop_path'],
            'genres' => json_encode($this->movie['genres']),
            'belongs_to_collection' => json_encode($this->movie['belongs_to_collection']),
            'budget' => $this->movie['budget'],
            'homepage' => $this->movie['homepage'],
            'imdb_id' => $this->movie['imdb_id'],
            'movie_id' => $this->movie['id'],
            'original_language' => $this->movie['original_language'],
            'original_title' => $this->movie['original_title'],
            'overview' => $this->movie['overview'],
            'popularity' => $this->movie['popularity'],
            'poster_path' => $this->movie['poster_path'],
            'production_companies' => json_encode($this->movie['production_companies']),
            'production_countries' => json_encode($this->movie['production_countries']),
            'release_date' => $this->movie['release_date'],
            'revenue' => $this->movie['revenue'],
            'runtime' => $this->movie['runtime'],
            'spoken_languages' => json_encode($this->movie['spoken_languages']),
            'status' => $this->movie['status'],
            'tagline' => $this->movie['tagline'],
            'title' => $this->movie['title'],
            'video' => $this->movie['video'],
            'vote_average' => $this->movie['vote_average'],
            'vote_count' => $this->movie['vote_count']
        ]);
    }
}
