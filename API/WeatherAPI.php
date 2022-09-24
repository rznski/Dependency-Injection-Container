<?php

declare(strict_types=1);

namespace App\API;

use App\Exception\CityNotFoundException;

class WeatherAPI
{
    public function __construct(private CityAPI $cityAPI)
    {}

    public function getWeather(string $city): string
    {
        if (!isset($this->cityAPI::CITIES[$city])) {
            throw new CityNotFoundException('Provided city does not exist in API');
        }

        return 'Today in ' . $city . ' is cold';
    }
}