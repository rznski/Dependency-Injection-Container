<?php

declare(strict_types=1);

namespace App\tests\API;

use App\API\CityAPI;
use App\API\WeatherAPI;
use App\Exception\CityNotFoundException;
use PHPUnit\Framework\TestCase;

class WeatherAPITest extends TestCase
{
    public function testToCheckThatWeatherAPIGetWeatherReturnString(): void
    {
        $result = $this->getWeatherAPI(new CityAPI())->getWeather('Vilnius');

        $this->assertStringContainsString('Vilnius', $result);
    }

    public function testToCheckThatGetWeatherThrowsExceptionIfCityNotFound(): void
    {
        $this->expectException(CityNotFoundException::class);
        $this->getWeatherAPI(new CityAPI())->getWeather('Test');
    }

    private function getWeatherAPI(CityAPI $cityAPI): WeatherAPI
    {
        return new WeatherAPI($cityAPI);
    }
}