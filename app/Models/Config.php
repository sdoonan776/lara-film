<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_url',
        'secure_base_url',
        'backdrop_sizes',
        'logo_sizes',
        'poster_sizes',
        'profile_sizes',
        'still_sizes'
    ];
}

