<?php

namespace App\Mappers;

class MovieMapper
{

    public function handle(Movie $movie)
    {
        Movie::create([
            'adult' => $movie['adult'],
            'backdrop_path',
            'genre_ids',
            'belongs_to_collection',
            'budget',
            'homepage',
            'imdb_id',
            'movie_id',
            'original_language',
            'original_title',
            'overview',
            'popularity',
            'poster_path',
            'release_date',
            'revenue',
            'runtime',
            'status',
            'tagline',
            'title',
            'video',
            'vote_average',
            'vote_count'
        ]);
    }
}
