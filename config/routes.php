<?php

declare(strict_types=1);

use App\Controller\HomeController;
use App\Controller\WeatherController;
use App\Route\Route;

return $routes = [
    '/' => new Route(HomeController::class, 'index'),
    'home' => new Route(HomeController::class, 'index'),
    'weather' => new Route(WeatherController::class, 'index'),
];