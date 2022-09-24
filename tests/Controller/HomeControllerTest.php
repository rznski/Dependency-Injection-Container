<?php

declare(strict_types=1);

namespace App\tests\Controller;

use App\Controller\HomeController;
use PHPUnit\Framework\TestCase;

class HomeControllerTest extends TestCase
{
    public function testToCheckThatHomeControllerIndexMethodReturnString(): void
    {
        $homeController = new HomeController();
        $result = $homeController->index();

        $this->assertStringContainsString('Home', $result);
    }
}