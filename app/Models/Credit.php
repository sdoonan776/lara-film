<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    public $table = 'credits';

    protected $fillable = [
        'id',
        'cast',
        'crew'
    ];
}
