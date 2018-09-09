<?php declare(strict_types=1);

namespace DefShop\Adapter\App\Basket;

use DefShop\Adapter\Core\Session;

class Basket
{
    const BASKET_KEY = "basket";

    /**
     * @var Session
     */
    private $storage;

    /**
     * Basket constructor.
     * @param Session $storage
     */
    public function __construct(Session $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @param int $id
     */
    public function add(int $id): void
    {
        $items = $this->storage->get(Basket::BASKET_KEY);
        if (is_array($items)) {
            if (!in_array($id, $items)) {
                $items[] = $id;
            }
        } else {
            $items = [$id];
        }
        $this->storage->set(Basket::BASKET_KEY, $items);
    }

    /**
     * @param int $id
     */
    public function remove(int $id): void
    {
        $items = $this->storage->get(Basket::BASKET_KEY);
        if (is_array($items)) {
            $items = array_diff($items, [$id]);
        }
        $this->storage->set(Basket::BASKET_KEY, $items);
    }

    /**
     * @return array
     */
    public function getAll(): array
    {

        return $this->storage->get(Basket::BASKET_KEY) ?? [];
    }

    public function clear(): void
    {
        $this->storage->set(Basket::BASKET_KEY, []);
    }
}
