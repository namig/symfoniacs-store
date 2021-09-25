<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;

abstract class StringValueObject
{
    protected string $value;

    protected function __construct(string $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public static function fromValue(string $value): static
    {
        return new static($value);
    }

    abstract protected function validate(string $value): void;
}
