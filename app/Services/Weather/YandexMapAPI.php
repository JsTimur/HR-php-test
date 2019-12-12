<?php

namespace App\Services\Weather;

class YandexMapAPI extends WeatherAPIAbstract {

    public function getCurrentByLatLon($lat = '53.243562', $lon = '34.363407')
    {
        $response = $this->service->request('GET',
            'https://api.weather.yandex.ru/v1/forecast?lat='.$lat.'&
            lon='.$lon.'
            &lang=ru_RU
            &limit=1
            &hours=false'
        );
        $weatherObj = json_decode($response->getBody());
        $this->setCurrentWeather($weatherObj->fact->temp);

        return $this->getCurrentWeather();
    }
}