<?php
declare(strict_types=1);

namespace App\Service\Order\Model;

use App\Service\Order\Model\Enum\OrderStatus;
use App\Service\Product\Model\Product;
use DateTimeImmutable;

readonly class Order
{
    /**
     * @param list<Product> $products
     */
    public function __construct(
        private int $id,
        private OrderStatus $status,
        private DateTimeImmutable $createdDate,
        private array $products,
        private OrderSummary $summary,
    ) {}

    public function getStatus(): OrderStatus
    {
        return $this->status;
    }

    public function getCreatedDate(): DateTimeImmutable
    {
        return $this->createdDate;
    }

    /**
     * @return list<Product>
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    public function getSummary(): OrderSummary
    {
        return $this->summary;
    }
}
