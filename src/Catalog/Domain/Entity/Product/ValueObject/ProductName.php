<?php

declare(strict_types=1);

namespace App\Catalog\Domain\Entity\Product\ValueObject;

use Webmozart\Assert\Assert;

final class ProductName
{
    private string $value;

    private function __construct(string $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    public static function fromValue(string $value): self
    {
        return new self($value);
    }

    public function value(): string
    {
        return $this->value;
    }

    private function validate(string $value): void
    {
        Assert::lengthBetween($value, 3, 255);
    }
}
