<?php

declare(strict_types=1);

namespace App\tests\Controller;

use App\API\WeatherAPI;
use App\Controller\WeatherController;
use PHPUnit\Framework\TestCase;

class WeatherControllerTest extends TestCase
{
    public function testThatIndexMethodCallsWeatherAPIGetWeatherMethod(): void
    {
        $weatherAPIMock = $this->getMockBuilder(WeatherAPI::class)->disableOriginalConstructor()->getMock();

        $weatherAPIMock
            ->expects($this->once())
            ->method('getWeather');

        $weatherController = $this->getWeatherController($weatherAPIMock);

        $weatherController->index();
    }

    private function getWeatherController(WeatherAPI $weatherAPI): WeatherController
    {
        return new WeatherController($weatherAPI);
    }
}