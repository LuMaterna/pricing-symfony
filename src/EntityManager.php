<?php
declare(strict_types=1);

namespace App;

use App\Database\Cart\CartEntity;
use App\Database\Entity;
use App\Database\Product\ProductEntity;
use DateTimeImmutable;
use LogicException;

readonly class EntityManager implements EntityManagerInterface
{
    public function find(string $entityName, int $id): Entity
    {
        // Dummy data
        return match ($entityName) {
            ProductEntity::class => new ProductEntity(
                id: $id,
                name: 'Product name',
                quantity: $id,
                price: $id * 10.0,
            ),
            CartEntity::class => new CartEntity(
                id: $id,
                dateCreated: new DateTimeImmutable('-1 day'),
                products: [
                    new ProductEntity(
                        id: 1,
                        name: 'Product 1',
                        quantity: 1,
                        price: 10.0,
                    ),
                    new ProductEntity(
                        id: 2,
                        name: 'Product 2',
                        quantity: 1,
                        price: 20.0,
                    ),
                ],
            ),
            default => throw new LogicException('Entity not found'),
        };
    }
}
