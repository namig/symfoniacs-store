<?php

declare(strict_types=1);

namespace App\Store\Controller;

use App\Store\Domain\Entity\Product;
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

    #[Route(path: '/product', methods: 'GET')]
    public function testProduct(): Response
    {
        $new = Product::createNew('new product');
        $existing = Product::fromExistingProduct(1, 'existing product');

        $new->id(); // TypeError: Return value must be of type int, null returned
        $existing->id(); // Ok

        return new Response("ok");
    }
}
