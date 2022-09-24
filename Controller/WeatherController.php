<?php

declare(strict_types=1);

namespace App\Controller;

use App\API\WeatherAPI;

class WeatherController extends AbstractController
{
    public function __construct(private WeatherAPI $weatherAPI)
    {}

    public function index(): void
    {
        try {
            $this->setResponseCode(200);

            $weather = $this->weatherAPI->getWeather('Vilnius');

            echo $weather;
        } catch (\Exception $exception) {
            $this->setResponseCode(400);

            throw new \Exception($exception->getMessage());
        }
    }
}