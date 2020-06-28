<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public $table = 'film';

    protected $fillable = [
        'language_id',
        'name'
    ];

    protected $casts = [
        'last_update' => 'datetime'
    ];
}
