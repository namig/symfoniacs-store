<?php

declare(strict_types=1);

namespace App\Catalog\Domain\Entity\Product\ValueObject;

use App\Shared\Domain\ValueObject\StringValueObject;
use Webmozart\Assert\Assert;

final class ProductName extends StringValueObject
{
    protected function validate(string $value): void
    {
        Assert::lengthBetween($value, 3, 255);
    }
}
