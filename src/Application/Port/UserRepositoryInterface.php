<?php declare(strict_types=1);

namespace DefShop\Application\Port;

use ArrayObject;
use ArrayAccess;
use DefShop\Domain\Model\User;

interface UserRepositoryInterface
{
    /**
     * @param string $email
     * @param string $passwordHash
     * @return User|null
     */
    public function login(string $email, string $passwordHash): ?User;

    /**
     * @param User $user
     */
    public function persist(User $user): void;

    /**
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User;
}
