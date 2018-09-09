<?php declare(strict_types=1);

namespace Tests\Unit\Domain\Model;

use Codeception\Test\Unit;
use DefShop\Domain\Model\Order;
use DefShop\Domain\Model\OrderItem;
use Mockery;
use Faker\Factory as FakerFactory;


/**
 * bin/codecept run unit Domain/Model/OrderTest
 */
class OrderTest extends Unit
{
    /**
     * @test
     */
    public function setGetId()
    {
        $instance = new Order();

        $faker = FakerFactory::create();

        $id = $faker->randomDigit;

        $instance->setId($id);

        $this->assertEquals($id, $instance->getId());
    }

    /**
     * @test
     */
    public function setGetPaymentMethod()
    {
        $instance = new Order();

        $faker = FakerFactory::create();

        $method = $faker->word;

        $instance->setPaymentMethod($method);

        $this->assertEquals($method, $instance->getPaymentMethod());
    }

    /**
     * @test
     */
    public function setGetTime()
    {
        $instance = new Order();

        $faker = FakerFactory::create();

        $time = $faker->dateTime();

        $instance->setTime($time);

        $this->assertEquals($time, $instance->getTime());
    }

    /**
     * @test
     */
    public function setGetItem()
    {
        $instance = new Order();

        $orderItem = new OrderItem();

        $instance->addItem($orderItem);

        $this->assertEquals($orderItem, current($instance->getItems()->toArray()));
    }
}
