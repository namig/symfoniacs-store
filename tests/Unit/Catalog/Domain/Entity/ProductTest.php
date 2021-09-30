<?php

declare(strict_types=1);

namespace Unit\Catalog\Domain\Entity;

use App\Catalog\Domain\Entity\Product\Product;
use App\Catalog\Domain\Entity\Product\ValueObject\ProductCode;
use App\Catalog\Domain\Entity\Product\ValueObject\ProductName;
use App\Catalog\Domain\Entity\Product\ValueObject\ProductSlug;
use PHPUnit\Framework\TestCase;

final class ProductTest extends TestCase
{
    public function testProductCreated(): void
    {
        $name = ProductName::fromValue('Some product name');
        $code = ProductCode::generate();
        $slug = ProductSlug::fromName($name);

        $product = Product::create($name, $code, $slug);

        self::assertEquals($name->value(), $product->name()->value());
        self::assertEquals($code->value(), $product->code()->value());
        self::assertEquals($slug->value(), $product->slug()->value());
    }
}
