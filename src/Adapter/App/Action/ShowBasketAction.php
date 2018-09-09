<?php declare(strict_types=1);

namespace DefShop\Adapter\App\Action;

use DefShop\Adapter\App\Basket\Basket;
use DefShop\Adapter\Core\Template;
use DefShop\Application\Port\ProductRepositoryInterface;

class ShowBasketAction
{
    /**
     * @var Basket
     */
    private $basket;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * ShowBasketAction constructor.
     * @param Basket $basket
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(Basket $basket, ProductRepositoryInterface $productRepository)
    {
        $this->basket = $basket;
        $this->productRepository = $productRepository;
    }

    public function __invoke()
    {
        $ids = $this->basket->getAll();

        $result = $this->productRepository->search(["ids"=>$ids], 0, 30);

        return Template::instance()->render("basket", ["products"=>$result->getItems()]);
    }
}
