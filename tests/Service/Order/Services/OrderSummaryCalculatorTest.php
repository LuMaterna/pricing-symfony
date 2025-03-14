<?php
declare(strict_types=1);

namespace Test\Tests\Service\Order\Services;

use App\Service\Cart\Model\Cart;
use App\Service\Order\Model\OrderSummary;
use App\Service\Order\Services\OrderSummaryCalculator;
use App\Service\Product\Model\Product;
use App\Service\Product\Services\ProductPrice\ProductPriceCalculator;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class OrderSummaryCalculatorTest extends TestCase
{
    /**
     * @var MockObject<ProductPriceCalculator>
     */
    private MockObject $productPriceCalculator;
    private OrderSummaryCalculator $orderSummaryCalculator;

    protected function setUp(): void
    {
        $this->productPriceCalculator = $this->createMock(ProductPriceCalculator::class);
        $this->orderSummaryCalculator = new OrderSummaryCalculator($this->productPriceCalculator);
    }

    public function testCalculate(): void
    {
        $cart = $this->createMock(Cart::class);
        $cart->method('getProducts')->willReturn([$this->createMock(Product::class)]);

        $this->productPriceCalculator
            ->method('calculate')
            ->willReturn(100.0);

        $orderSummary = $this->orderSummaryCalculator->calculate($cart);

        $this->assertInstanceOf(OrderSummary::class, $orderSummary);
        $this->assertEquals(199.0, $orderSummary->getTotal());
        $this->assertEquals(100.0, $orderSummary->getProductsPrice());
        $this->assertEquals(99.0, $orderSummary->getDeliveryPrice());
    }
}
