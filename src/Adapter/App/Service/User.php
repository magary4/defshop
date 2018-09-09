<?php declare(strict_types=1);

namespace DefShop\Adapter\App\Service;

use DefShop\Adapter\Core\Session;
use DefShop\Application\Port\UserRepositoryInterface;
use DefShop\Domain\Model\User as ApiUser;
use DefShop\Domain\Model;

class User
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @var Session
     */
    private $session;

    /**
     * User constructor.
     * @param UserRepositoryInterface $userRepository
     * @param Session $session
     */
    public function __construct(UserRepositoryInterface $userRepository, Session $session)
    {
        $this->userRepository = $userRepository;
        $this->session = $session;
    }

    /**
     * @param string $email
     * @param string $passwordHash
     * @return bool
     */
    public function login(string $email, string $passwordHash): bool
    {
        $user = $this->userRepository->login($email, md5($passwordHash));

        if ($user) {
            $this->session->set("user", serialize($user));
        }

        return null === $user ? false : true;
    }

    public function register(string $name, string $email, string $password): bool
    {
        $user = $this->userRepository->findByEmail($email);

        if (null !== $user) {
            return false;
        }

        $user = new Model\User();
        $user->setEmail($email);
        $user->setName($name);
        $user->setPasswordHash(md5($password));
        $this->userRepository->persist($user);

        return true;
    }

    /**
     * @return ApiUser|null
     */
    public function getUser(): ?ApiUser
    {
        $user = null;
        $userSerialized = $this->session->get("user");

        if ($userSerialized) {
            try {
                $user = unserialize($userSerialized);
            } catch (\Exception $e) {
                $user = null;
            }
        }

        return $user;
    }
}
