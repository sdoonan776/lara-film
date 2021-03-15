<?php

namespace App\Imports;

use App\Models\Rating;
use App\Contracts\Importable;

class RatingImport implements Importable
{
    public function import()
    {
        $csvData = array_map('str_getcsv', file('ratings.csv'));
        $csvHeader = $csvData[0];
        unset($csvData[0]);
        foreach($csvData as $row) {
            $row = array_combine($csvHeader, $row);
            Rating::create([
                'userId' => $row['userId'],
                'movieId' => $row['movieId'],
                'rating' => $row['rating'],
                'timestamp' => $row['timestamp'] 
            ]);
        }
    }
}