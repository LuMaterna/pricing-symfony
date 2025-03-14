<?php
declare(strict_types=1);

namespace App\Database\Cart;

use App\EntityManagerInterface;
use App\Service\Cart\Model\Cart;
use App\Service\Cart\Model\CartFactory;

readonly class CartRepository
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private CartFactory $cartFactory,
    ) {}

    public function find(int $cartId): Cart
    {
        // Logic to find cart by id, throw exception when none found... etc.
        /** @var CartEntity $cartEntity */
        $cartEntity = $this->entityManager->find(CartEntity::class, $cartId);

        // I would make select to DTO at Doctrine
        // But for this case let it be a Factory
        return $this->cartFactory->fromEntity($cartEntity);
    }
}
