<?php

declare(strict_types=1);

namespace App\Catalog\Domain\Entity\Product\ValueObject;

use App\Shared\Domain\Util\SlugGenerator;
use App\Shared\Domain\ValueObject\Slug;

final class ProductSlug extends Slug
{
    private static ?SlugGenerator $slugGenerator = null;

    public static function fromName(ProductName $productName): self
    {
        $slug = self::slugGenerator()->generate($productName->value());

        return new self($slug);
    }

    private static function slugGenerator(): SlugGenerator
    {
        if (self::$slugGenerator === null) {
            self::$slugGenerator = (new SlugGenerator());
        }

        return self::$slugGenerator;
    }
}
