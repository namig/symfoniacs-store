<?php

declare(strict_types=1);

namespace App\Example;


final class User
{
    public function __construct(private int $id, private string $phone)
    {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function phone(): string
    {
        return $this->phone;
    }
}
