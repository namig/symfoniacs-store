<?php

declare(strict_types=1);

namespace App\Catalog\Domain\Entity\Product\ValueObject;

use App\Shared\Domain\Util\SlugGenerator;
use App\Shared\Domain\ValueObject\Slug;

final class ProductSlug extends Slug
{
    public static function fromName(ProductName $productName): self
    {
        $slug = (new SlugGenerator())->generate($productName->value());

        return new self($slug);
    }
}
