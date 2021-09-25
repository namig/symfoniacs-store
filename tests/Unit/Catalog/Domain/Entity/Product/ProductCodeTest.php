<?php

declare(strict_types=1);

namespace Unit\Catalog\Domain\Entity\Product;

use App\Catalog\Domain\Entity\Product\ValueObject\ProductCode;
use PHPUnit\Framework\TestCase;
use Webmozart\Assert\InvalidArgumentException;

final class ProductCodeTest extends TestCase
{
    /**
     * @dataProvider correctValues
     */
    public function testModelCreatedWithCorrectValue(string $value): void
    {
        self::assertEquals($value, ProductCode::fromValue($value)->value());
    }

    /**
     * @dataProvider invalidValues
     */
    public function testModelShouldThrowExceptionWithInvalidValue(string $value): void
    {
        $this->expectException(InvalidArgumentException::class);
        ProductCode::fromValue($value);
    }

    public function testModelGeneratedWithCorrectValue(): void
    {
        $value = ProductCode::generate()->value();
        self::assertIsNumeric($value);

        if ((int)$value < 100000000 || (int)$value > 999999999) {
            self::fail('Value should be between 100000000 and 999999999');
        }
    }

    public function correctValues(): array
    {
        return [
            ['100000000'],
            ['555555555'],
            ['999999999']
        ];
    }

    public function invalidValues(): array
    {
        return [
            ['99999999'],
            ['1000000000'],
            ['ABC'],
            ['ABC-123']
        ];
    }
}
