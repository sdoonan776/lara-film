<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LoadMovies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movies:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loads movie data from csv file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param $csv
     * @return mixed
     */
    public function handle($csv)
    {
        
    }
}
