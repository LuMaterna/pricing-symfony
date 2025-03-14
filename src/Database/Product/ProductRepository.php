<?php
declare(strict_types=1);

namespace App\Database\Product;

use App\EntityManagerInterface;
use App\Service\Product\Model\Product;
use App\Service\Product\Model\ProductFactory;

readonly class ProductRepository
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private ProductFactory $productFactory,
    ) {}

    public function find(int $cartId): Product
    {
        // Logic to find cart by id, throw exception when none found... etc.
        /** @var ProductEntity $productEntity */
        $productEntity = $this->entityManager->find(ProductEntity::class, $cartId);

        // I would make select to DTO at Doctrine
        // But for this case let it be a Factory
        return $this->productFactory->fromEntity($productEntity);
    }
}
