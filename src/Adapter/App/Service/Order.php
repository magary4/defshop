<?php declare(strict_types=1);

namespace DefShop\Adapter\App\Service;

use DefShop\Adapter\Port\ProductRepository;
use DefShop\Domain\Model;
use DefShop\Domain\Model\OrderItem;
use DefShop\Adapter\Port\OrderRepository;

class Order
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;

    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * Order constructor.
     * @param OrderRepository $orderRepository
     * @param ProductRepository $productRepository
     */
    public function __construct(OrderRepository $orderRepository, ProductRepository $productRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * @param int $userId
     * @param array $products
     * @param string $method
     * @throws \Exception
     */
    public function place(int $userId, array $products, string $method): void
    {
        $order = new Model\Order();
        $order->setUserId($userId);
        $order->setPaymentMethod($method);
        $order->setTime(new \DateTime());

        $this->orderRepository->persist($order);

        // TODO: decouple this
        $productItems = $this->productRepository->search(["ids"=>$products], 0, 30)->getItems();

        if (!count($productItems)) {
            throw new \Exception("No products placed to the order");
        }

        foreach ($productItems as $product) {
            $orderItem = new OrderItem();
            $orderItem->setPrice($product->getPrice());
            $orderItem->setProductId($product->getId());
            $orderItem->setOrder($order);
            $this->orderRepository->persist($orderItem);
        }
    }
}
