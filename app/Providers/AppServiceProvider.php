<?php

namespace App\Providers;

use App\Services\Weather\WeatherProvider;
use App\Services\Weather\YandexWeatherProvider;
use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(WeatherProvider::class, YandexWeatherProvider::class);
    }
}
