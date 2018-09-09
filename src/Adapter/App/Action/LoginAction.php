<?php declare(strict_types=1);

namespace DefShop\Adapter\App\Action;

use DefShop\Adapter\App\Service\User;
use DefShop\Adapter\Core\Template;
use DefShop\Application\Port\ProductRepositoryInterface;
use Zend\Diactoros\ServerRequest;

class LoginAction
{
    /**
     * @var ServerRequest
     */
    private $request;

    /**
     * @var User
     */
    private $userService;

    /**
     * LoginAction constructor.
     * @param ServerRequest $request
     * @param User $userService
     */
    public function __construct(ServerRequest $request, User $userService)
    {
        $this->request = $request;
        $this->userService = $userService;
    }

    public function __invoke()
    {
        if ("GET" === $this->request->getMethod()) {
            return Template::instance()->render("login");
        }

        if ("POST"=== $this->request->getMethod()) {
            $payload = $this->request->getParsedBody()["payload"] ?? [];
            $email = $payload["email"] ?? null;
            $password = $payload["password"] ?? null;

            $user = false;
            if ($email && $password) {
                $user = $this->userService->login($email, $password);
            }

            if ($user) {
                header("Location: /checkout");
                return;
            } else {
                return Template::instance()->render("login", ["success"=>false]);
            }
        }
    }
}
