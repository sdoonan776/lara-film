<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieMetadata extends Model
{
    public $table = 'movie_metadata';

    protected $fillable = [
        'adult',
        'belongs_to_collection',
        'budget',
        'genres',
        'homepage',
        'id',
        'imdb_id',
        'original_language',
        'original_title',
        'overview',
        'popularity',
        'poster_path',
        'production_companies',
        'production_countries',
        'release_date',
        'revenue',
        'runtime',
        'spoken_languages',
        'status',
        'tagline',
        'title',
        'video',
        'vote_average',
        'vote_count'
    ];

    protected $casts = [
        'adult' => 'integer',
        'video' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

}
