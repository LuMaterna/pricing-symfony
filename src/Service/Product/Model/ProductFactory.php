<?php
declare(strict_types=1);

namespace App\Service\Product\Model;

use App\Database\Product\ProductEntity;
use App\Service\Product\Services\ProductPrice\ProductPriceCalculator;

readonly class ProductFactory
{
    public function __construct(
        private ProductPriceCalculator $productPriceCalculator,
    ) {}

    public function fromEntity(ProductEntity $productEntity): Product
    {
        return new Product(
            id: $productEntity->getId(),
            name: $productEntity->getName(),
            quantity: $productEntity->getQuantity(),
            price: $productEntity->getPrice(),
        );
    }
}
