<?php

namespace App\Models;

use App\Http\Middleware\WeatherClient;

class WeatherService
{
    private WeatherClient $weatherClient;

    public function __construct()
    {
        $this->weatherClient = new WeatherClient();
    }


    public function getDataFromApi(): Weather
    {
        // Validate data and other logic.
        return Weather::createByJsoNData($this->weatherClient->fetch([]));
    }

    public function getAllDataFromDataBase() :array
    {
        // Other business logic comes here, for example the formating to human readable format
        return Weather::all()->toArray();
    }
}
