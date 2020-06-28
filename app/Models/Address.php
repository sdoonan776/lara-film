<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{

    // public $table = 'address';

    // protected $fillable = [
    //     'address_id',
    //     'address_1',
    //     'address_2',
    //     'district',
    //     'city',
    //     'postal_code',
    //     'phone'
    // ];

    /**
     * return countries accosiated with an address
     *
     * @return BelongsTo
     */
    public function countries(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id', 'address_id');
    }

}
