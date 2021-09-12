<?php

declare(strict_types=1);

namespace App\Store\Domain\Entity;

use LogicException;

final class Product
{
    private ?int $id;

    private string $name;

    private function __construct(?int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function createNew(string $name): self
    {
        return new self(null, $name);
    }

    public static function fromExistingProduct(int $id, string $name): self
    {
        return new self($id, $name);
    }

    public function id(): int
    {
        if ($this->id === null) {
            throw new LogicException("Object is used in product creation process, using id() method forbidden!");
        }

        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }
}
