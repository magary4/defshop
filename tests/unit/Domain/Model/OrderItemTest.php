<?php declare(strict_types=1);

namespace Tests\Unit\Domain\Model;

use Codeception\Test\Unit;
use DefShop\Domain\Model\Order;
use DefShop\Domain\Model\OrderItem;
use DefShop\Domain\Model\Tax;
use DefShop\Domain\Model\User;
use Mockery;
use Faker\Factory as FakerFactory;


/**
 * bin/codecept run unit Domain/Model/OrderItemTest
 */
class OrderItemTest extends Unit
{
    /**
     * @test
     */
    public function setGetId()
    {
        $instance = new OrderItem();

        $faker = FakerFactory::create();

        $id = $faker->randomDigit;

        $instance->setId($id);

        $this->assertEquals($id, $instance->getId());
    }

    /**
     * @test
     */
    public function setGetOrder()
    {
        $order = new Order();

        $instance = new OrderItem();
        $instance->setOrder($order);

        $this->assertEquals($order, $instance->getOrder());
    }

    /**
     * @test
     */
    public function setGetPrice()
    {
        $instance = new OrderItem();

        $faker = FakerFactory::create();

        $price = $faker->randomDigit;

        $instance->setPrice($price);

        $this->assertEquals($price, $instance->getPrice());
    }
}
