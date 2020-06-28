<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Film extends Model
{

    public $table = 'film';

    protected $fillable = [
        'film_id',
        'title',
        'description',
        'release_year',
        'language_id',
        'original_language_id',
        'rental_rate',
        'length',
        'replacement_cost',
        'rating',
        'special_features'
    ];

    protected $casts = [
        'last_update' => 'datetime'
    ];

    /**
     * Gets languages related to films
     *
     * @return BelongsTo
     */
    public function languages(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'language_id', 'film_id');
    }

    /**
     * Gets category related to films
     *
     * @return HasMany
     */
    public function category(): HasMany
    {
        return $this->hasMany(Category::class, 'category_id', 'film_id');
    }
}
