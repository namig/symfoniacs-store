<?php

declare(strict_types=1);

namespace Unit\Shared\Infrastructure\String;

use App\Shared\Infrastructure\String\SlugGenerator;
use PHPUnit\Framework\TestCase;

final class SlugGeneratorTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testSlugGeneratedFromString(string $inputStr, string $expected)
    {
        self::assertEquals($expected, (new SlugGenerator())->generate($inputStr));
    }

    public function dataProvider(): array
    {
        return [
            [
                'PHP. Объекты, шаблоны и методики программирования | Зандстра Мэт',
                'php-obekty-shablony-i-metodiki-programmirovaniya-zandstra-met'
            ],
            [
                'Предметно-ориентированное проектирование (DDD). Структуризация сложных программных систем',
                'predmetno-orientirovannoe-proektirovanie-ddd-strukturizaciya-slozhnyh-programmnyh-sistem'
            ],
            [
                'string with english symbols, numbers 123 and other characters ?!().,:;-$#@',
                'string-with-english-symbols-numbers-123-and-other-characters',
            ]
        ];
    }
}

