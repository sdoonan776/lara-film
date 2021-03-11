<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    public $table = 'film';

    protected $fillable = [
        'film_id',
        'budget',
        'genres',
        'homepage',
        'id',
        'keywords',
        'original_language',
        'overview',
        'popularity',
        'production_companies',
        'production_countries',
        'release_date',
        'revenue',
        'runtime',
        'spoken_languages',
        'status',
        'tagline',
        'title',
        'vote_average',
        'vote_count',
        'rental_duration',
        'rental_rate',
        'length',
        'replacement_cost',
        'rating',
        'special_features'
    ];

    protected $casts = [
        'last_update' => 'datetime'
    ];

}