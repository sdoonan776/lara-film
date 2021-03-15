<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public $table = 'ratings';

    protected $fillable = [
        'userId',
        'movieId',
        'rating',
        'timestamp' 
    ];
}
