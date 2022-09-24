<?php

declare(strict_types=1);

namespace App\Route;

class Route
{
    public function __construct(public string $controller, public string $action)
    {}
}