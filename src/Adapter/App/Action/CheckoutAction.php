<?php declare(strict_types=1);

namespace DefShop\Adapter\App\Action;

use DefShop\Adapter\App\Basket\Basket;
use DefShop\Adapter\App\Service\Order;
use DefShop\Adapter\App\Service\User;
use DefShop\Adapter\Core\Template;
use Zend\Diactoros\ServerRequest;

class CheckoutAction
{
    /**
     * @var ServerRequest
     */
    private $request;

    /**
     * @var Basket
     */
    private $basket;

    /**
     * @var User
     */
    private $userService;

    /**
     * @var Order
     */
    private $orderService;

    /**
     * CheckoutAction constructor.
     * @param ServerRequest $request
     * @param Basket $basket
     * @param User $userService
     * @param Order $orderService
     */
    public function __construct(ServerRequest $request, Basket $basket, User $userService, Order $orderService)
    {
        $this->request = $request;
        $this->basket = $basket;
        $this->userService = $userService;
        $this->orderService = $orderService;
    }

    public function __invoke()
    {
        if (!count($this->basket->getAll())) {
            throw new \Exception("No products in the basket");
        }

        $user = $this->userService->getUser();

        if (!$user) {
            header("Location: /login");
            return;
        }

        $paymentMethods = ["method1", "method2"]; // TODO: read methods from DB

        if ("GET" === $this->request->getMethod()) {
            return Template::instance()->render("checkout", ["paymentMethods"=>$paymentMethods]);
        }

        if ("POST"=== $this->request->getMethod()) {
            $method = $this->request->getParsedBody()["payload"] ?? null;
            $method = $method["paymentMethod"] ?? null;

            if (!$method) {
                return Template::instance()->render("checkout", ["paymentMethods"=>$paymentMethods]);
            }

            $this->orderService->place($user->getId(), $this->basket->getAll(), $method);
            $this->basket->clear();

            return Template::instance()->render("checkout", ["submitted"=>true]);
        }
    }
}
