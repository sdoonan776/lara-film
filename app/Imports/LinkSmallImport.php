<?php

namespace App\Imports;

use App\Models\LinkSmall;
use App\Contracts\Importable;

class LinkSmallImport implements Importable
{

    /**
     * Imports a small links into database table
     */
    public function import()
    {
        $csvData = array_map('str_getcsv', file('links_small.csv'));
        $csvHeader = $csvData[0];
        unset($csvData[0]);
        foreach($csvData as $row) {
            $row = array_combine($csvHeader, $row);
            LinkSmall::create([
                'movieId' => $row['movieId'],
                'imdbId' => $row['imdbId'],
                'tmdbId' => $row['tmdbId'] ? $row['tmdbId'] : null 
            ]);
        }
    }
}