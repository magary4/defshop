<?php declare(strict_types=1);

namespace Tests\Unit\Domain\Model;

use Codeception\Test\Unit;
use DefShop\Domain\Model\Order;
use DefShop\Domain\Model\Product;
use DefShop\Domain\Model\Tax;
use Mockery;
use Faker\Factory as FakerFactory;

/**
 * bin/codecept run unit Domain/Model/ProductTest
 */
class ProductTest extends Unit
{
    /**
     * @test
     */
    public function setGetId()
    {
        $faker = FakerFactory::create();
        $id = $faker->randomDigit;

        $product = new Product();
        $product->setId($id);

        $this->assertEquals($id, $product->getId());
    }

    /**
     * @test
     */
    public function setGetName()
    {
        $faker = FakerFactory::create();
        $name = $faker->word;

        $product = new Product();
        $product->setName($name);

        $this->assertEquals($name, $product->getName());
    }

    /**
     * @test
     */
    public function setGetColor()
    {
        $faker = FakerFactory::create();
        $color = $faker->word;

        $product = new Product();
        $product->setColor($color);

        $this->assertEquals($color, $product->getColor());
    }

    /**
     * @test
     */
    public function setGetPrice()
    {
        $faker = FakerFactory::create();
        $price = $faker->randomDigit;

        $product = new Product();
        $product->setPrice($price);

        $this->assertEquals($price, $product->getPrice());
    }

    /**
     * @test
     */
    public function setGetTax()
    {
        $tax = new Tax();
        $product = new Product();
        $product->setTax($tax);

        $this->assertEquals($tax, $product->getTax());
    }

    /**
     * @test
     */
    public function getGloss()
    {
        $price = 6969;
        $taxRate = 9;

        $tax = new Tax();
        $tax->setTax($taxRate);

        $product = new Product();
        $product->setPrice($price);
        $product->setTax($tax);

        $gross = $price + $price * ($taxRate/100);

        $this->assertEquals($gross, $product->getPriceGross());

    }
}
