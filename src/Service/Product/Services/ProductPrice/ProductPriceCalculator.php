<?php
declare(strict_types=1);

namespace App\Service\Product\Services\ProductPrice;

use App\Service\Product\Model\Product;
use App\Service\Product\Services\ProductPrice\Processor\ProductPriceProcessor;

readonly class ProductPriceCalculator
{
    /**
     * @param list<ProductPriceProcessor> $processors
     */
    public function __construct(
        private array $processors,
    ) {}

    public function calculate(Product $product): float
    {
        $finalProductPrice = $product->getPrice();
        foreach ($this->processors as $processor) {
            $finalProductPrice = $processor->process($product, $finalProductPrice);
        }

        return $finalProductPrice;
    }
}
