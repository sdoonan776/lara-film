<?php

namespace App\Console\Commands;

use App\Imports\LinkImport;
use App\Imports\CreditImport;
use App\Imports\RatingImport;
use App\Imports\KeywordImport;
use Illuminate\Console\Command;
use App\Imports\LinkSmallImport;
use App\Imports\RatingSmallImport;
use App\Imports\MovieMetadataImport;

class ImportMovieData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movies:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loads movie data from csv file';

    protected $movieMetadataImport;
    protected $creditImport;
    protected $linkImport;
    protected $ratingImport;
    protected $linkSmallImport;
    protected $ratingSmallImport;
    protected $keywordImport;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        MovieMetadataImport $movieMetadataImport,
        CreditImport $creditImport,
        LinkImport $linkImport,
        RatingImport $ratingImport,
        LinkSmallImport $linkSmallImport,
        RatingSmallImport $ratingSmallImport,
        KeywordImport $keywordImport
    )
    {
        parent::__construct();
        $this->movieMetadataImport = $movieMetadataImport;
        $this->creditImport = $creditImport;
        $this->linkImport = $linkImport;
        $this->linkSmallImport = $linkSmallImport;
        $this->ratingImport = $ratingImport;
        $this->ratingSmallImport = $ratingSmallImport;
        $this->keywordImport = $keywordImport;
    }

    /**
     * Execute the console command.
     *
     * @param $csv
     * @return mixed
     */
    public function handle()
    {
        $this->movieMetadataImport->import();
        // $this->linkImport->import();
        // $this->linkSmallImport->import();
        // $this->ratingImport->import();
        // $this->ratingSmallImport->import();
        // $this->creditImport->import();
        // $this->keywordImport->import();
    }
}
