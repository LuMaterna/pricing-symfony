<?php
declare(strict_types=1);

namespace App\Service\Order\UseCase;

use App\Service\BaseUseCase;
use App\Service\Cart\Services\CartProvider;
use App\Service\Order\Model\Order;
use App\Service\Order\Model\OrderFactory;
use App\Service\Order\Services\OrderSummaryCalculator;

/**
 * Order purchase use-case
 * Code example
 * Lot's of impossible flows, incomplete, ...
 */
readonly class OrderPurchase implements BaseUseCase
{
    public function __construct(
        private CartProvider $cartProvider,
        private OrderSummaryCalculator $orderSummaryCalculator,
        private OrderFactory $orderFactory,
    ){}

    public function execute(): Order
    {
        $cart = $this->cartProvider->provide();
        $orderSummary = $this->orderSummaryCalculator->calculate($cart);

        // Save order
        // Payment gateway
        // notifications
        // etc.

        return $this->orderFactory->create(
            $cart,
            $orderSummary,
        );
    }
}
