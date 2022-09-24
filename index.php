<?php

declare(strict_types=1);

use App\Route\Router;

include_once './vendor/autoload.php';
include_once './config/routes.php';

$url = $_SERVER['REQUEST_URI'];
$router = new Router();
$route = $router->initializeRoute($url, $routes);

$router->callRoute($route);