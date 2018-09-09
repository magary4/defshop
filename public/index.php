<?php declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use DefShop\Adapter\Core\Template;
use Zend\Diactoros\ServerRequest;

$settings = require __DIR__ . '/../configs/settings.php';

Template::instance()->setViewsDir(__DIR__ . '/../views/');

session_start();

$container = new \DefShop\Adapter\App\DIC($settings);
$container->init();

$router = new \DefShop\Adapter\App\Router($container);
$router->bootstrap();

$request = $container->get(ServerRequest::class);

// try to match the request to a route.
$route = $router->getMatcher()->match($request);
if (!$route) {
    http_response_code(404);
    die("Page not Found"); // TODO: pretty template
}

$callable = $route->handler;

//try {
    echo $callable( $request );
//} catch (\Exception $e) {
//    http_response_code(500);
//    die("Something went wrong"); // TODO: pretty template
//}