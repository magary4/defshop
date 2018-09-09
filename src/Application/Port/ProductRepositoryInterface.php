<?php declare(strict_types=1);

namespace DefShop\Application\Port;

use DefShop\Adapter\Core\SearchResult;

interface ProductRepositoryInterface
{
    public function search(array $conditions, int $start, int $limit): SearchResult;

    public function getColors();
}
