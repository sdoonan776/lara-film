<?php

namespace App\Imports;

use App\Models\Keyword;
use App\Contracts\Importable;

class KeywordImport implements Importable
{
    public function import()
    {
        $csvData = array_map('str_getcsv', file('keywords.csv'));
        $csvHeader = $csvData[0];
        unset($csvData[0]);
        foreach($csvData as $row) {
            $row = array_combine($csvHeader, $row);
            Keyword::create([
                'id' => $row['id'],
                'keywords' => $row['keywords']
            ]);
        }
    }
}
