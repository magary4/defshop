<?php declare(strict_types=1);

namespace DefShop\Adapter\Core;

class Session
{
    private $session;

    public function __construct(&$session)
    {
        $this->session = &$session;
    }

    public function get($key)
    {
        return $this->session[$key] ?? null;
    }

    public function set($key, $value): void
    {
        $this->session[$key] = $value;
    }
}
