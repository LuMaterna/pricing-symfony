<?php
declare(strict_types=1);

namespace App\Controller\Order;

use App\Service\Order\UseCase\OrderPurchase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Lets assume we have logged in user
 * Middleware for identity check, filled cart with products etd.
 */
#[Route('/order')]
class OrderController extends AbstractController
{
    public function __construct(
        readonly private OrderPurchase $orderPurchase,
    ) {}

    #[Route('/purchase')]
    public function purchase(): Response
    {
        $order = $this->orderPurchase->execute();

        return $this->json($order);
    }
}
