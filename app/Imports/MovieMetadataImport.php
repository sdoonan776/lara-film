<?php

namespace App\Imports;

use App\Models\MovieMetadata;

class MovieMetadataImport
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
        $result = [];
        $counter = 0;


        // dd($result);

        foreach($result as $row) {

            $min = min(count($csvHeader), count($row));
            $result = array_combine(array_slice($csvHeader, 0, $min), array_slice($row, 0, $min));
            MovieMetadata::create([
                'id' => $row['id'],
                'adult' => $row['adult'] == 'False' ? 0 : 1,
                'belongs_to_collection' => $row['belongs_to_collection'],
                'budget' => $row['budget'],
                'genres' => $row['genres'],
                'homepage' => $row['homepage'],
                'imdb_id' => $row['imdb_id'],
                'original_language' => $row['original_language'],
                'original_title' => $row['original_title'],
                'overview' => $row['overview'],
                'popularity' => $row['popularity'],
                'poster_path' => $row['poster_path'],
                'production_companies' => $row['production_companies'],
                'production_countries' => $row['production_countries'],
                'release_date' => $row['release_date'],
                'revenue' => $row['revenue'],
                'runtime' => $row['runtime'],
                'spoken_languages' => $row['spoken_languages'],
                'status' => $row['status'],
                'tagline' => $row['tagline'],
                'title' => $row['title'],
                'video' => $row['video'] == 'False' ? 0 : 1,
                'vote_average' => $row['vote_average'],
                'vote_count' => $row['vote_count']
            ]);
        }
    }
}
