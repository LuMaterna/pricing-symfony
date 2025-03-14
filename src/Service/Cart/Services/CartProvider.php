<?php
declare(strict_types=1);

namespace App\Service\Cart\Services;

use App\Database\Cart\CartRepository;
use App\Service\Cart\Model\Cart;

readonly class CartProvider
{
    public function __construct(
        private CartRepository $cartRepository,
    ) {}

    public function provide(): Cart
    {
        // Logic to provide current logged in customer cart id
        $cartId = 1;

        // Try catch on find method
        return $this->cartRepository->find($cartId);
    }
}
