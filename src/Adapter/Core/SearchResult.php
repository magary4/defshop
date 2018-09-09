<?php declare(strict_types=1);

namespace DefShop\Adapter\Core;

class SearchResult
{
    /**
     * @var \ArrayObject
     */
    private $items;

    /**
     * @var int
     */
    private $total;

    public function __construct(\ArrayObject $items, int $total)
    {
        $this->items = $items;
        $this->total = $total;
    }

    /**
     * @return \ArrayObject
     */
    public function getItems(): \ArrayObject
    {
        return $this->items;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }
}
