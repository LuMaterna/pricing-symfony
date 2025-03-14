<?php
declare(strict_types=1);

namespace App\Service\Product\Model;

readonly class Product
{
    public function __construct(
        private int $id,
        private string $name,
        private int $quantity,
        private float $price,
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

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
