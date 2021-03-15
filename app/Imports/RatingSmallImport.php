<?php

namespace App\Imports;

use App\Models\RatingSmall;
use App\Contracts\Importable;

class RatingSmallImport implements Importable
{
    public function import()
    {
        $csvData = array_map('str_getcsv', file('ratings_small.csv'));
        $csvHeader = $csvData[0];
        unset($csvData[0]);
        foreach($csvData as $row) {
            $row = array_combine($csvHeader, $row);
            RatingSmall::create([
                'userId' => $row['userId'],
                'movieId' => $row['movieId'],
                'rating' => $row['rating'],
                'timestamp' => $row['timestamp'] 
            ]);
        }        
    }
}