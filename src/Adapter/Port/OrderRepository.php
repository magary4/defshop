<?php declare(strict_types=1);

namespace DefShop\Adapter\Port;

use ArrayObject;
use ArrayAccess;
use DefShop\Application\Port\OrderRepositoryInterface;
use Doctrine\ORM\EntityManager;

class OrderRepository implements OrderRepositoryInterface
{
    /** @var EntityManager */
    private $em;

    /**
     * CategoryRepository constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function persist($order): int
    {
        $this->em->persist($order);
        $this->em->flush($order);

        return $order->getId();
    }
}
