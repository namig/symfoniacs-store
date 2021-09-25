<?php

declare(strict_types=1);

namespace App\Catalog\Domain\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use App\Catalog\Domain\Entity\Product\ValueObject\ProductCode;
use App\Catalog\Domain\Entity\Product\ValueObject\ProductId;
use App\Catalog\Domain\Entity\Product\ValueObject\ProductName;
use App\Catalog\Domain\Entity\Product\ValueObject\ProductSlug;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table(name: 'product')]
final class Product
{
    #[ORM\Id]
    #[ORM\Column(type: 'string')]
    private string $id;

    #[ORM\Column(type: 'string')]
    private string $name;

    #[ORM\Column(type: 'string')]
    private string $code;

    #[ORM\Column(type: 'string')]
    private string $slug;

    private function __construct(ProductName $name, ProductCode $code, ProductSlug $slug)
    {
        $this->id = ProductId::generate()->value();
        $this->name = $name->value();
        $this->code = $code->value();
        $this->slug = $slug->value();
    }

    public static function create(ProductName $name, ProductCode $code, ProductSlug $slug): self
    {
        return new self($name, $code, $slug);
    }

    public function id(): ProductId
    {
        return ProductId::fromValue($this->id);
    }

    public function code(): ProductCode
    {
        return ProductCode::fromValue($this->code);
    }

    public function name(): ProductName
    {
        return ProductName::fromValue($this->name);
    }

    public function slug(): ProductSlug
    {
        return ProductSlug::fromValue($this->slug);
    }
}
