<?php

namespace App\Imports;

use App\Models\Link;
use App\Contracts\Importable;

class LinkImport implements Importable
{
    public function import()
    {
        $csvData = array_map('str_getcsv', file('links.csv'));
        $csvHeader = $csvData[0];
        unset($csvData[0]);
        foreach($csvData as $row) {
            $row = array_combine($csvHeader, $row);
            Link::create([
                'movieId' => $row['movieId'],
                'imdbId' => $row['imdbId'],
                'tmdbId' => $row['tmdbId'] ? $row['tmdbId'] : null 
            ]);
        }
    }
}