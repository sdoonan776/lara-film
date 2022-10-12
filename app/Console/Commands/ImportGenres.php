<?php

namespace App\Console\Commands;

use App\Models\Genre;
use App\Services\TMDB\GenreService;
use Illuminate\Console\Command;

class ImportGenres extends Command
{
    private GenreService $genreService;

    public function __construct(GenreService $genreService)
    {
        parent::__construct();
        $this->genreService = $genreService;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:genres';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports genres from the api and stores them in the database';

    /**
     * Execute the console command.
     *
     * @return
     */
    public function handle()
    {
        foreach ($this->genreService->getGenres() as $genre) {
            Genre::create([
                'genre_id' => $genre['id'],
                'name' => $genre['name']
            ]);
        }

    }
}
