<?php declare(strict_types=1);

namespace Tests\Unit\Adapter\App\Basket;

use Codeception\Test\Unit;
use DefShop\Adapter\App\Basket\Basket;
use DefShop\Adapter\Core\Session;
use Mockery;

/**
 * bin/codecept run unit Adapter/App/Basket/BasketTest
 */
class BasketTest extends Unit
{
    /** @test */
    public function addExistingId()
    {
        $itemsInBasket = [
            123, 321
        ];

        $sessionMock = Mockery::mock(Session::class);
        $sessionMock->shouldReceive([
            'get' => $itemsInBasket,
            'set' => function($key, $value) use ($itemsInBasket) {
                $this->assertEquals($itemsInBasket, $value);
            }
        ]);

        $basket = new Basket($sessionMock);

        $basket->add(123);
    }

    /** @test */
    public function addNotExistingId()
    {
        $itemsInBasket = [
            123, 321
        ];

        $itemToAdd = 123321;

        $sessionMock = Mockery::mock(Session::class);
        $sessionMock->shouldReceive([
            'get' => $itemsInBasket,
            'set' => function($key, $value) use ($itemsInBasket, $itemToAdd) {
                $this->assertNotEquals(array_merge($itemsInBasket, [$itemToAdd]), $value);
            }
        ]);

        $basket = new Basket($sessionMock);

        $basket->add($itemToAdd);
    }

    /** @test */
    public function removeFromBasket()
    {
        $itemsInBasket = [
            123, 321
        ];

        $itemToRemove = 321;

        $sessionMock = Mockery::mock(Session::class);
        $sessionMock->shouldReceive([
            'get' => $itemsInBasket,
            'set' => function($key, $value) use ($itemsInBasket, $itemToRemove) {
                $this->assertEquals(array_diff($itemsInBasket, [$itemToRemove]), $value);
            }
        ]);

        $basket = new Basket($sessionMock);

        $basket->remove($itemToRemove);
    }
}