<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'lat', 'long', 'temp', 'pressure', 'humidity', 'temp_min', 'temp_max'];

    public static function createByJsoNData(array $jsonData): Weather
    {
        return new Weather([
            'id' => $jsonData['weather'][0]->id,
            'name' => '?',
            'lat' => $jsonData['coord']->lat,
            'lon' => $jsonData['coord']->lon,
            'temp' => $jsonData['main']->temp,
            'pressure' => $jsonData['main']->pressure,
            'humidity' => $jsonData['main']->humidity,
            'temp_min' => $jsonData['main']->temp_min,
            'temp_max' => $jsonData['main']->temp_max,
        ]);
    }
}
