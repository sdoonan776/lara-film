<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RatingSmall extends Model
{
    public $table = 'ratings_small';

    protected $fillable = [
        'userId',
        'movieId',
        'rating',
        'timestamp'
    ];
}
