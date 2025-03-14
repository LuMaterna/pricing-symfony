<?php
declare(strict_types=1);

namespace App\Service\Product\Services\ProductPrice\Processor;

use App\Service\Product\Model\Product;

readonly class SegmentPriceProcessor implements ProductPriceProcessor
{
    public function process(Product $product, float $productPrice): float
    {
        // There should be waaaay better logic.. :-)
        $clientIsInSegmentSaleGroup = true;
        if ($clientIsInSegmentSaleGroup) {
            return $productPrice * 0.9;
        }

        return $productPrice;
    }
}
