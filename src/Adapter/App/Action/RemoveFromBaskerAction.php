<?php declare(strict_types=1);

namespace DefShop\Adapter\App\Action;

use DefShop\Adapter\App\Basket\Basket;

class RemoveFromBaskerAction
{
    /**
     * @var Basket
     */
    private $basket;

    /**
     * AddToBaskerAction constructor.
     * @param Basket $basket
     */
    public function __construct(Basket $basket)
    {
        $this->basket = $basket;
    }

    public function __invoke()
    {
        $this->basket->remove((int)$_GET["id"]);
        header("Location: /basket");
    }
}
