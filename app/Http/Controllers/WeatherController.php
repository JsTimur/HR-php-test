<?php

namespace App\Http\Controllers;

use App\Services\Weather\WeatherService;
use Illuminate\Http\Request;


class WeatherController extends Controller
{
    public function index(WeatherService $service)
    {
        // Температура в Брянске
        $city['name'] = 'Брянск';
        $temperature = $service->getCityCurrentTemp('53.243562', '34.363407');
        $city['value'] = $temperature <= 0 ? $temperature : '+'.$temperature.'°';

        return view('pages.weather', ['city'=>$city]);
    }
}
