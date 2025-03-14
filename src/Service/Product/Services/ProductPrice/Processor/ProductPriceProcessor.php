<?php
declare(strict_types=1);

namespace App\Service\Product\Services\ProductPrice\Processor;

use App\Service\Product\Model\Product;

interface ProductPriceProcessor
{
    public function process(Product $product, float $productPrice): float;
}
