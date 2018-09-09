<?php declare(strict_types=1);

namespace Tests\Unit\Domain\Model;

use Codeception\Test\Unit;
use DefShop\Domain\Model\Order;
use DefShop\Domain\Model\Tax;
use Mockery;
use Faker\Factory as FakerFactory;


/**
 * bin/codecept run unit Domain/Model/TaxTest
 */
class TaxTest extends Unit
{
    /**
     * @test
     */
    public function setGetId()
    {
        $instance = new Tax();

        $faker = FakerFactory::create();

        $id = $faker->randomDigit;

        $instance->setId($id);

        $this->assertEquals($id, $instance->getId());
    }

    /**
     * @test
     */
    public function setGetName()
    {
        $faker = FakerFactory::create();
        $name = $faker->word;

        $instance = new Tax();
        $instance->setName($name);

        $this->assertEquals($name, $instance->getName());
    }

    /**
     * @test
     */
    public function setGetTax()
    {
        $faker = FakerFactory::create();
        $tax = $faker->randomDigit;

        $instance = new Tax();
        $instance->setTax($tax);

        $this->assertEquals($tax, $instance->getTax());
    }
}
