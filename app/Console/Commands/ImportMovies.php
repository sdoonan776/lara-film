<?php

namespace App\Console\Commands;

use App\Exceptions\ApiException;
use App\Exceptions\NotFoundException;
use App\Exceptions\ServerException;
use App\Jobs\MovieFeed;
use App\Jobs\MovieMapper;
use App\Jobs\TestJob;
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
    protected $description = 'Import movies from TMDB API into the database';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
//        dispatch(new TestJob())->onQueue('default');
        dispatch(new MovieFeed($this->movieService))->onQueue('default');
    }
}
