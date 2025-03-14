<?php
declare(strict_types=1);

namespace App\Service\Product\Services\ProductPrice\Processor;

use App\Service\Product\Model\Product;
use Random\RandomException;

readonly class PercentageSalePriceProcessor implements ProductPriceProcessor
{
    public function process(Product $product, float $productPrice): float
    {
        try {
            if (random_int(0, 1) === 1) {
                return $productPrice * 0.5; // 50% random off! Go for it
            }
        } catch (RandomException) { // Love this exception
            return $productPrice;
        }

        return $productPrice;
    }
}
