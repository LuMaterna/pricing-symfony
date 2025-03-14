<?php
declare(strict_types=1);

namespace App\Service\Cart\Model;

use App\Database\Cart\CartEntity;
use App\Database\Product\ProductEntity;
use App\Service\Product\Model\Product;
use App\Service\Product\Model\ProductFactory;

readonly class CartFactory
{
    public function __construct(
        private ProductFactory $productFactory,
    ) {}

    public function fromEntity(CartEntity $cartEntity): Cart
    {
        return new Cart(
            id: $cartEntity->getId(),
            products: array_map(
                fn (ProductEntity $product): Product => $this->productFactory->fromEntity($product),
                $cartEntity->getProducts()
            ),
        );
    }
}
