<?php declare(strict_types=1);

namespace DefShop\Application\Port;

use ArrayObject;
use ArrayAccess;
use DefShop\Domain\Model\Order;

interface OrderRepositoryInterface
{
    /**
     * @param Order $order
     * @return int
     */
    public function persist(Order $order): int; // TODO: Implement OrderId ValueObject
}
