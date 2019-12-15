<?php


namespace App\Services\Weather;

use GuzzleHttp\Client;

class YandexWeatherProvider implements WeatherProvider
{
    /**
     * @var Client
     */
    private $client;

    public function __construct()
    {
        $this->client = new Client(
            [
                'headers' => [
                    'X-Yandex-API-Key' => env('YANDEX_WEATHER_API_KEY')
                ]
            ]
        );
    }

    public function getCurrentTempByLatLon(string $lat, string $lon): int
    {
        $response = $this->client->request(
            'GET',
            "https://api.weather.yandex.ru/v1/forecast?lat={$lat}&lon={$lon}&lang=ru_RU&limit=1&hours=false"
        );
        $weatherObj = json_decode($response->getBody(), true);
        return $weatherObj['fact']['temp'] ?? -1000;
    }
}