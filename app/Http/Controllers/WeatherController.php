<?php

namespace App\Http\Controllers;

use App\Services\Weather\WeatherService;
use App\Services\Weather\YandexMapAPI;
use Illuminate\Http\Request;


class WeatherController extends Controller
{
    public function index()
    {
        $getWeather = new WeatherService(new YandexMapAPI(['headers' => ['X-Yandex-API-Key' => env('YANDEX_WEATHER_API_KEY')]]));
        // Температура в Брянске
        $getWeather->setLatLon('53.243562', '34.363407');
        $city['name'] = 'Брянск';
        $city['value'] = $getWeather->getCityCurrentTemp();

        return view('pages.index', ['city'=>$city]);
    }
}
