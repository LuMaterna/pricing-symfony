<?php
declare(strict_types=1);

namespace App\Service\Cart\Model;

use App\Service\Product\Model\Product;

readonly class Cart
{
    /**
     * @param list<Product> $products
     */
    public function __construct(
        private int $id,
        private array $products,
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return list<Product>
     */
    public function getProducts(): array
    {
        return $this->products;
    }
}
