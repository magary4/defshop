<?php declare(strict_types=1);

namespace DefShop\Adapter\App\Action;

use DefShop\Adapter\App\Service\User;
use DefShop\Adapter\Core\Template;
use DefShop\Application\Port\ProductRepositoryInterface;
use Zend\Diactoros\ServerRequest;

class RegisterAction
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
     * RegisterAction constructor.
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
            return Template::instance()->render("register");
        }

        if ("POST"=== $this->request->getMethod()) {
            $payload = $this->request->getParsedBody()["payload"] ?? [];
            $email = $payload["email"] ?? null;
            $name = $payload["name"] ?? null;
            $password = $payload["password"] ?? null;
            $password_repeat = $payload["password_repeat"] ?? null;

            if (!$email || !$name || !$password) {
                return Template::instance()->render("register", ["message" => "All fields are required"]);
            }

            if ($password !== $password_repeat) {
                return Template::instance()->render("register", ["message" => "Passwords must be the same"]);
            }

            // Validate email only. No restrictions regarding length for other fields

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return Template::instance()->render("register", ["message" => "Email is invalid"]);
            }

            $success = $this->userService->register($name, $email, $password);

            return Template::instance()->render("register", [
                "message" => $success ? "Registration successful" : "User with such email exists"]);
        }
    }
}
