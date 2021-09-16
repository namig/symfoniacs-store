<?php

declare(strict_types=1);

namespace App\Tests\Store\Controller;

use App\Store\Controller\TestController;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Response;

class TestControllerTest extends TestCase
{
    public function testTest_Always_ReturnsCorrectResult(): void
    {
        $controller = new TestController();
        $result = $controller->test();

        self::assertEquals(
            new Response('<h1>Test home page!</h1>'),
            $result
        );
    }
}