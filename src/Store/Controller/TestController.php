<?php

declare(strict_types=1);

namespace App\Store\Controller;

use App\Catalog\Domain\Entity\Product\Product;
use App\Catalog\Domain\Entity\Product\ValueObject\ProductCode;
use App\Catalog\Domain\Entity\Product\ValueObject\ProductName;
use App\Catalog\Domain\Entity\Product\ValueObject\ProductSlug;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
final class TestController
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    #[Route(path: '/')]
    public function test(): Response
    {
        if (preg_match('/[^a-z0-9\-]/', 'some-product-code123;')) {
            echo "error";
        }

        return new Response('<h1>Test home page!</h1>');
    }

    #[Route(path: '/test')]
    public function testProductCreation(): Response
    {
        $name = ProductName::fromValue('Some product name');
        $code = ProductCode::generate();
        $slug = ProductSlug::fromName($name);

        $product = Product::create($name, $code, $slug);

        $this->entityManager->persist($product);
        $this->entityManager->flush();

        $productFromDatabase = $this->entityManager->find(Product::class, $product->id()->value());

        return new Response('<h1>Product created successfully!</h1>');
    }
}
