<?php

namespace App\Services\Weather;

class WeatherService {

    /**
     * @var WeatherProvider
     */
    private $provider;

    /**
     * WeatherService constructor.
     * @param WeatherProvider $provider
     */
    public function __construct(WeatherProvider $provider)
    {
        $this->provider = $provider;
    }

    public function getCityCurrentTemp(string $lat, string $lon):int {
        return $this->provider->getCurrentTempByLatLon($lat,$lon);
    }

}