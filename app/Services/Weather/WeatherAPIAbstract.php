<?php

namespace App\Services\Weather;
use GuzzleHttp\Client as Guzzle ;

abstract class WeatherAPIAbstract {
    protected $currentWeather = Null;

    public function __construct($requestHeaders = [])
    {
        $this->service = new Guzzle($requestHeaders);
    }

    abstract function getCurrentByLatLon($lat,$lon);

    function setCurrentWeather($value) {
        $this->currentWeather = $value;
    }

    function getCurrentWeather() {
        return $this->currentWeather;
    }
}