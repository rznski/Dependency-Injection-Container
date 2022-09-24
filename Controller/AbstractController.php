<?php

declare(strict_types=1);

namespace App\Controller;

abstract class AbstractController
{
    protected function setResponseCode(int $responseCode)
    {
        http_response_code($responseCode);
    }
}