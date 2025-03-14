<?php
declare(strict_types=1);

namespace App\Service\Order\Model;

use App\Service\Cart\Model\Cart;
use App\Service\Order\Model\Enum\OrderStatus;
use DateTimeImmutable;

readonly class OrderFactory
{
    public function create(Cart $cart, OrderSummary $orderSummary): Order
    {
        return new Order(
            id: random_int(1, 1000),
            status: OrderStatus::CREATED,
            createdDate: new DateTimeImmutable(),
            products: $cart->getProducts(), // Let's assume we really want to have same Product entity on shop, cart and order... For now only :D
            summary: $orderSummary,
        );
    }
}
