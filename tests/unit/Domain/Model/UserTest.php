<?php declare(strict_types=1);

namespace Tests\Unit\Domain\Model;

use Codeception\Test\Unit;
use DefShop\Domain\Model\Order;
use DefShop\Domain\Model\Tax;
use DefShop\Domain\Model\User;
use Mockery;
use Faker\Factory as FakerFactory;


/**
 * bin/codecept run unit Domain/Model/UserTest
 */
class UserTest extends Unit
{
    /**
     * @test
     */
    public function setGetId()
    {
        $instance = new User();

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

        $instance = new User();
        $instance->setName($name);

        $this->assertEquals($name, $instance->getName());
    }

    /**
     * @test
     */
    public function setGetEmail()
    {
        $faker = FakerFactory::create();
        $email = $faker->email;

        $instance = new User();
        $instance->setEmail($email);

        $this->assertEquals($email, $instance->getEmail());
    }

    /**
     * @test
     */
    public function setGetPasswordHash()
    {
        $faker = FakerFactory::create();
        $md5 = $faker->md5;

        $instance = new User();
        $instance->setPasswordHash($md5);

        $this->assertEquals($md5, $instance->getPasswordHash());
    }
}
