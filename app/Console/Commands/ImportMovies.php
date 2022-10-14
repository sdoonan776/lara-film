<?php

namespace App\Console\Commands;

use App\Exceptions\ApiException;
use App\Exceptions\NotFoundException;
use App\Exceptions\ServerException;
use App\Jobs\MovieMapper;
use App\Services\TMDB\MovieService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;

class ImportMovies extends Command
{

    private MovieService $movieService;

    public function __construct(
        MovieService $movieService,
    )
    {
        parent::__construct();
        $this->movieService = $movieService;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:movies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return JsonResponse
     */
    public function handle()
    {
        for ($i = 1; $i < 10; $i++) {
            $movies = collect($this->movieService->getRecentMovies($i)['results']);
            foreach ($movies as $movie) {
                $movie = $this->movieService->getMovie($movie['id']);
                MovieMapper::dispatch($movie);
                print_r($movie['title'] . 'has been imported');
            }
        }
    }
}
