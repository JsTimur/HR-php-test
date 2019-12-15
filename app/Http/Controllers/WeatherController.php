<?php

namespace App\Http\Controllers;

use App\Services\Weather\WeatherService;
use App\Services\Weather\YandexMapAPI;
use Illuminate\Http\Request;


class WeatherController extends Controller
{
    public function index(WeatherService $service)
    {
        // Температура в Брянске
        $city['name'] = 'Брянск';
        $city['value'] = $service->getCityCurrentTemp('53.243562', '34.363407');

        return view('pages.index', ['city'=>$city]);
    }
}
