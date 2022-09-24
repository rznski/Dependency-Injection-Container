<?php

declare(strict_types=1);

namespace App\Route;

use App\DependencyInjection\Container;

class Router
{
    private const HOME_SLASH = '/';

    public function callRoute(Route $route): void
    {
        $controller = (new Container())->get($route->controller);
        $action = $route->action;

        call_user_func([$controller, $action]);
    }

    public function initializeRoute(string $url, array $routes): Route
    {
        if ($url === self::HOME_SLASH) {
            return $routes[$url] ?? $routes['/'];
        }

        $url = str_replace(self::HOME_SLASH, '', $_SERVER['REQUEST_URI']);

        return $routes[$url] ?? $routes['/'];
    }
}