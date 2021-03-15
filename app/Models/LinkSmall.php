<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkSmall extends Model
{
    public $table = 'links_small';

    protected $fillable = [
        'movieId',
        'imdbId',
        'tmdbId'
    ];
}
