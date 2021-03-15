<?php

namespace App\Imports;

use App\Models\Movie;
use App\Imports\BaseImport;

class MovieImport
{
     /**
     * Maps csv rows into Movie model database columns
     * @return Response 
     */
    public function import()
    {
        $csvData = array_map('str_getcsv', file('movies_metadata.csv'));
        $csvHeader = $csvData[0];
        unset($csvData[0]);
        foreach($csvData as $row) {
            $row = array_combine($csvHeader, $row);
            Movie::create([
                
            ]);
        }
    }
}