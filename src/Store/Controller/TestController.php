<?php

declare(strict_types=1);

namespace App\Store\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
final class TestController
{
    #[Route(path: '/')]
    public function test(): Response
    {
        return new Response('<h1>Test home page!</h1>');
    }
}
