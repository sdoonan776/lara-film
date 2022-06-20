<?php

namespace App\Console\Commands\Import;

use Illuminate\Console\Command;

class ImportMoviesCommand extends Command
{
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
    protected $description = 'Imports movies into the database from a csv file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle($file)
    {
        /* $csvData = $file; */
    }
}
