<?php

namespace App\Services\Weather;

class WeatherService {
    protected $lat;
    protected $lon;

    public function __construct(WeatherAPIAbstract $service)
    {
        $this->service = $service;
    }

    public function setLatLon($lat,$lon) {
        $this->lat = $lat;
        $this->lon = $lon;
    }

    public function getCityCurrentTemp() {
        return $this->service->getCurrentByLatLon($this->lat,$this->lon);
    }

}