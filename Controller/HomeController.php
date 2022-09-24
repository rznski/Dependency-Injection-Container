<?php

declare(strict_types=1);

namespace App\Controller;

class HomeController extends AbstractController
{
    private const HOME_TEXT = 'Home page controller';

    public function index(): string
    {
        $this->setResponseCode(200);

        echo self::HOME_TEXT;

        return self::HOME_TEXT;
    }
}