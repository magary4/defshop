<?php declare(strict_types=1);

namespace DefShop\Adapter\Port;

use ArrayObject;
use ArrayAccess;
use DefShop\Application\Port\OrderRepositoryInterface;
use DefShop\Application\Port\UserRepositoryInterface;
use DefShop\Domain\Model\Order;
use DefShop\Domain\Model\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\NoResultException;

class UserRepository implements UserRepositoryInterface
{
    /** @var EntityManager */
    private $em;

    /**
     * CategoryRepository constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param string $email
     * @param string $passwordHash
     * @return User|null
     */
    public function login(string $email, string $passwordHash): ?User
    {
        $alias = 'u';

        $queryBuilder = $this->em->createQueryBuilder();

        $queryBuilder
            ->select($alias)
            ->from(User::class, $alias)
            ->where($alias.".email = :email")
            ->andWhere($alias.".passwordHash = :passwordHash")
            ->setParameter(":email", $email)
            ->setParameter(":passwordHash", $passwordHash);

        try {
            $user = $queryBuilder
                ->getQuery()
                ->getSingleResult();
            $user->setPasswordHash("");
        } catch (NoResultException $exception) {
            $user = null;
        }

        return $user;
    }

    public function persist(User $user): void
    {
        $this->em->persist($user);
        $this->em->flush();
    }

    public function findByEmail(string $email): ?User
    {
        $alias = 'u';

        $queryBuilder = $this->em->createQueryBuilder();

        $queryBuilder
            ->select($alias)
            ->from(User::class, $alias)
            ->where($alias.".email = :email")
            ->setParameter(":email", $email);

        $user = $queryBuilder
                ->getQuery()
                ->getResult();

        return $user ? current($user) : null;
    }
}
