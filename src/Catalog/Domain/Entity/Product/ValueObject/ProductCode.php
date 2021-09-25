<?php

declare(strict_types=1);

namespace App\Catalog\Domain\Entity\Product\ValueObject;

use App\Shared\Domain\ValueObject\StringValueObject;
use Webmozart\Assert\Assert;

final class ProductCode extends StringValueObject
{
    protected function validate(string $value): void
    {
        Assert::numeric($value);
        Assert::length($value, 9);
    }

    public static function generate(): self
    {
        return new self((string)random_int(100000000, 999999999));
    }
}
