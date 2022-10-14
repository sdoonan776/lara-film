<?php

namespace App\Console\Commands;

use App\Models\Config;
use App\Services\TMDB\ConfigService;
use Illuminate\Console\Command;

class ImportConfigs extends Command
{
    private ConfigService $configService;

    public function __construct(ConfigService $configService)
    {
        parent::__construct();
        $this->configService = $configService;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:configs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports image configuration arrays into database';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $configs = $this->configService->getConfiguration()['images'];
        foreach ($configs as $config) {
            Config::create([
                'base_url' => $config['base_url'],
                'secure_base_url' => $config['secure_base_url'],
                'backdrop_sizes' => json_encode($config['backdrop_sizes']),
                'logo_sizes' => json_encode($config['logo_sizes']),
                'poster_sizes' => json_encode($config['poster_sizes']),
                'profile_sizes' => json_encode($config['profile_sizes']),
                'still_sizes' => json_encode($config['still_sizes'])
            ]);
        }
    }
}
