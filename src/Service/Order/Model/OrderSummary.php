<?php
declare(strict_types=1);

namespace App\Service\Order\Model;

readonly class OrderSummary
{
    public function __construct(
        private float $total,
        private float $productsPrice,
        private float $deliveryPrice,
    ) {}

    public function getTotal(): float
    {
        return $this->total;
    }

    public function getProductsPrice(): float
    {
        return $this->productsPrice;
    }

    public function getDeliveryPrice(): float
    {
        return $this->deliveryPrice;
    }
}
