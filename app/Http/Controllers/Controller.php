<?php

namespace App\Http\Controllers;

use App\Models\WeatherService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private WeatherService $weatherService;

    public function weathers(Request $request)
    {
        $this->weatherService = new WeatherService();
        return $this->weatherService->getAllDataFromDataBase();
    }

    public function bycity(Request $request)
    {
        return view('welcome');
    }
}
