<?php declare(strict_types=1);

namespace DefShop\Adapter\App;

use DefShop\Adapter\App\Action\AddToBaskerAction;
use DefShop\Adapter\App\Action\CheckoutAction;
use DefShop\Adapter\App\Action\LoginAction;
use DefShop\Adapter\App\Action\ProductListAction;
use DefShop\Adapter\App\Action\RegisterAction;
use DefShop\Adapter\App\Action\RemoveFromBaskerAction;
use DefShop\Adapter\App\Action\ShowBasketAction;
use DefShop\Adapter\App\Basket\Basket;
use DefShop\Adapter\App\Service;
use DefShop\Adapter\Core\Session;
use DefShop\Adapter\Port\OrderRepository;
use DefShop\Adapter\Port\ProductRepository;
use DefShop\Adapter\Port\UserRepository;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\Common\Cache\FilesystemCache;
use Doctrine\Common\Persistence\Mapping\Driver\PHPDriver;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Zend\Diactoros\ServerRequest;
use Zend\Diactoros\ServerRequestFactory;

class DIC
{
    /**
     * @var array
     */
    private $services;

    /**
     * @var array
     */
    private $config;

    /**
     * DIC constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $name
     * @param object|callable $service
     */
    public function set($name, $service): void
    {
        $this->services[$name] = $service;
    }

    /**
     * @param string $name
     * @return object
     * @throws \Exception
     */
    public function get(string $name): object
    {
        if (!isset($this->services[$name])) {
            throw new \Exception("Service $name not found");
        }

        // lazy load
        if ($this->services[$name] instanceof \Closure) {
            $s = $this->services[$name];
            $this->services[$name] = $s($this);
        }

        return $this->services[$name];
    }

    /**
     * @return array
     */
    public function getConfigs(): array
    {
        return $this->config;
    }

    public function init(): void
    {
        $this->initDoctrine();
        $this->initCore();
        $this->initActions();
        $this->initRepositories();
        $this->initServices();
    }

    public function initCore(): void
    {
        $this->set(ServerRequest::class, function (): ServerRequest {
            return ServerRequestFactory::fromGlobals($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);
        });

        $this->set(Session::class, function (): Session {
            return new Session($_SESSION);
        });

        $this->set(Basket::class, function ($container): Basket {
            return new Basket($container->get(Session::class));
        });
    }

    public function initServices(): void
    {
        $this->set(Service\User::class, function ($container): Service\User {
            return new Service\User(
                $container->get(UserRepository::class),
                $container->get(Session::class)
            );
        });

        $this->set(Service\Order::class, function ($container): Service\Order {
            return new Service\Order(
                $container->get(OrderRepository::class),
                $container->get(ProductRepository::class)
            );
        });
    }

    public function initActions(): void
    {
        $this->set(LoginAction::class, function ($container): LoginAction {
            return new LoginAction(
                $container->get(ServerRequest::class),
                $container->get(Service\User::class)
            );
        });

        $this->set(RegisterAction::class, function ($container): RegisterAction {
            return new RegisterAction(
                $container->get(ServerRequest::class),
                $container->get(Service\User::class)
            );
        });

        $this->set(ProductListAction::class, function ($container): ProductListAction {
            return new ProductListAction(
                $container->get(ProductRepository::class),
                $container->get(ServerRequest::class)
            );
        });

        $this->set(ShowBasketAction::class, function ($container): ShowBasketAction {
            return new ShowBasketAction(
                $container->get(Basket::class),
                $container->get(ProductRepository::class)
            );
        });

        $this->set(AddToBaskerAction::class, function ($container): AddToBaskerAction {
            return new AddToBaskerAction($container->get(Basket::class));
        });

        $this->set(RemoveFromBaskerAction::class, function ($container): RemoveFromBaskerAction {
            return new RemoveFromBaskerAction($container->get(Basket::class));
        });

        $this->set(CheckoutAction::class, function ($container): CheckoutAction {
            return new CheckoutAction(
                $container->get(ServerRequest::class),
                $container->get(Basket::class),
                $container->get(Service\User::class),
                $container->get(Service\Order::class)
            );
        });
    }

    public function initRepositories(): void
    {
        $this->set(OrderRepository::class, function ($container): OrderRepository {
            return new OrderRepository($container->get(EntityManager::class));
        });

        $this->set(ProductRepository::class, function ($container): ProductRepository {
            return new ProductRepository($container->get(EntityManager::class));
        });

        $this->set(UserRepository::class, function ($container): UserRepository {
            return new UserRepository($container->get(EntityManager::class));
        });
    }

    public function initDoctrine(): void
    {
        $this->set(EntityManager::class, function (DIC $c): EntityManager {
            $configs = $c->getConfigs();
            $cache = $configs['settings']['doctrine']['entity_dev_mode']
                ? new ArrayCache()
                : new FilesystemCache($configs['settings']['doctrine']['cache_dir']);

            $config = Setup::createConfiguration(
                $configs['settings']['doctrine']['dev_mode'],
                $configs['settings']['doctrine']['proxy_dir'],
                $cache
            );

            $config->setMetadataDriverImpl(
                new PHPDriver($configs['settings']['doctrine']['php_metadata_dirs'])
            );

            return EntityManager::create(
                $configs['settings']['doctrine']['connection'],
                $config
            );
        });
    }
}
