<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;

use InvalidArgumentException;

class Slug
{
    private string $value;

    protected function __construct(string $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    public static function fromValue(string $value): static
    {
        return new static($value);
    }

    public function value(): string
    {
        return $this->value;
    }

    protected function validate(string $value): void
    {
        if (preg_match('/[^a-z0-9\-]/', $value)) {
            throw new InvalidArgumentException(
                "Slug can't contain chars other than a-z, numbers from 0 to 9 and - symbol"
            );
        }
    }
}
