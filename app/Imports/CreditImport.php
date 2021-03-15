<?php

namespace App\Imports;

use App\Contracts\Importable;
use App\Models\Credit;

class CreditImport implements Importable
{
    /**
     * Maps csv rows into Credit model database columns
     * @return Response 
     */
    public function import()
    {
        $csvData = array_map('str_getcsv', file('credits.csv'));
        $csvHeader = $csvData[0];
        unset($csvData[0]);
        foreach($csvData as $row) {
            $row = array_combine($csvHeader, $row);
            Credit::create([
                'id' => $row['id'],
                'cast' => $row['cast'],
                'crew' => $row['crew']
            ]);
        }
    }
    
}