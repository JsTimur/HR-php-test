<?php

namespace App\Services\Weather;

interface WeatherProvider
{
    public function getCurrentTempByLatLon(string $lat, string $lon): int;
}