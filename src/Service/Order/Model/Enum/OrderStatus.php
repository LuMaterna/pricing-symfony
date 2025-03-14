<?php
declare(strict_types=1);

namespace App\Service\Order\Model\Enum;

enum OrderStatus: string
{
    case CREATED = 'created';
    case PAID = 'paid';
    case DELIVERED = 'delivered';
    case CANCELLED = 'cancelled';
}
