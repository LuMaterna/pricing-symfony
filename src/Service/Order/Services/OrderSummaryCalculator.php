<?php
declare(strict_types=1);

namespace App\Service\Order\Services;

use App\Service\Cart\Model\Cart;
use App\Service\Order\Model\OrderSummary;
use App\Service\Product\Services\ProductPrice\ProductPriceCalculator;

readonly class OrderSummaryCalculator
{
    public function __construct(
        private ProductPriceCalculator $productPriceCalculator,
    ) {}

    public function calculate(Cart $cart): OrderSummary
    {
        $productTotalPrice = $this->calculateProductsTotalPrice($cart);
        $deliveryPrice = 99.0; // Fixed for example

        return new OrderSummary(
            total: $productTotalPrice + $deliveryPrice,
            productsPrice: $productTotalPrice,
            deliveryPrice: $deliveryPrice,
        );
    }

    public function calculateProductsTotalPrice(Cart $cart): float
    {
        $productsTotal = 0.0;
        foreach ($cart->getProducts() as $product) {
            $productsTotal += $this->productPriceCalculator->calculate($product);
        }

        return $productsTotal;
    }
}
