<?php
declare(strict_types=1);

namespace App\Database\Cart;

use App\Database\Entity;
use App\Database\Trait\PrimaryKey;
use DateTimeImmutable;
use App\Database\Product\ProductEntity;

// Like an db entity
// Table name cart
readonly class CartEntity implements Entity
{
    use PrimaryKey;

    /**
     * @param int $id
     * @param DateTimeImmutable $dateCreated
     * @param list<ProductEntity> $products
     */
    public function __construct(
        private int $id,
        private DateTimeImmutable $dateCreated,
        // I would use ArrayCollection, but I did not want to have a bulky load of packages like Doctrine for just an example...
        private array $products,
        // ...
    ) {}

    public function getDateCreated(): DateTimeImmutable
    {
        return $this->dateCreated;
    }

    /**
     * @return list<ProductEntity>
     */
    public function getProducts(): array
    {
        return $this->products;
    }
}
