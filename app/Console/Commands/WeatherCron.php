<?php

namespace App\Console\Commands;

use App\Models\WeatherService;
use Illuminate\Console\Command;

class WeatherCron extends Command
{
    private WeatherService $weatherService;

    protected $signature = 'weather:cron';

    protected $description = 'Hourly Weather APi sync task';

    public function __construct()
    {
        parent::__construct();
        $this->weatherService = new WeatherService();
    }

    public function handle()
    {
        $weather = $this->weatherService->getDataFromApi();
        $weather->save();
    }
}
