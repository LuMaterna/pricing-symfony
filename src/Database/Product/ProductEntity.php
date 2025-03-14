<?php
declare(strict_types=1);

namespace App\Database\Product;

// This would be Doctrine Entity
// Table name product
use App\Database\Entity;
use App\Database\Trait\PrimaryKey;

readonly class ProductEntity implements Entity
{
    use PrimaryKey;

    public function __construct(
        private int $id,
        private string $name,
        private int $quantity,
        private float $price,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
