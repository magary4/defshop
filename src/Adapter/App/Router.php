<?php declare(strict_types=1);

namespace DefShop\Adapter\App;

use Aura\Router\Matcher;
use Aura\Router\RouterContainer;
use DefShop\Adapter\App\Action;

class Router
{
    /**
     * @var RouterContainer
     */
    private $routerContainer;

    /**
     * @var \Aura\Router\Map
     */
    private $map;

    /**
     * @var DIC
     */
    private $container;

    /**
     * @var \Aura\Router\Matcher
     */
    private $matcher;

    /**
     * Router constructor.
     * @param DIC $container
     */
    public function __construct(DIC $container)
    {
        $this->container = $container;
        $this->routerContainer = new RouterContainer();
        $this->map = $this->routerContainer->getMap();
        $this->matcher = $this->routerContainer->getMatcher();
    }

    public function bootstrap(): void
    {
        // add a route to the map, and a handler for it
        $this->map->get('shop', '/', $this->container->get(Action\ProductListAction::class));
        $this->map->get('basket.add', '/basket/add', $this->container->get(Action\AddToBaskerAction::class));
        $this->map->get('basket.remove', '/basket/remove', $this->container->get(Action\RemoveFromBaskerAction::class));
        $this->map->get('basket.show', '/basket', $this->container->get(Action\ShowBasketAction::class));
        $this->map->get('checkout', '/checkout', $this->container->get(Action\CheckoutAction::class));
        $this->map->post('checkout_', '/checkout', $this->container->get(Action\CheckoutAction::class));
        $this->map->get('login', '/login', $this->container->get(Action\LoginAction::class));
        $this->map->post('login_', '/login', $this->container->get(Action\LoginAction::class));
        $this->map->get('register', '/register', $this->container->get(Action\RegisterAction::class));
        $this->map->post('register_', '/register', $this->container->get(Action\RegisterAction::class));
    }

    public function getMatcher(): Matcher
    {
        return $this->matcher;
    }
}
