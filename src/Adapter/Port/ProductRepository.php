<?php declare(strict_types=1);

namespace DefShop\Adapter\Port;

use ArrayObject;
use ArrayAccess;
use DefShop\Adapter\Core\SearchResult;
use DefShop\Application\Port\ProductRepositoryInterface;
use DefShop\Domain\Model\Product;
use Doctrine\ORM\EntityManager;

class ProductRepository implements ProductRepositoryInterface
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


    public function search(array $conditions, int $start, int $limit): SearchResult
    {
        $alias = 'p';

        $queryBuilder = $this->em->createQueryBuilder();

        // TODO: fixme
        if (isset($conditions["color"])) {
            $queryBuilder
                ->where($alias.".color = :color")
                ->setParameter(":color", $conditions["color"]);
        }

        if (isset($conditions["ids"])) {
            $queryBuilder
                //->where(Criteria::expr()->in("id", $conditions["ids"]));
                ->where($alias.".id IN (:ids)")
                ->setParameter(":ids", $conditions["ids"]);
        }

        $result = $queryBuilder
            ->select($alias)
            ->from(Product::class, $alias)
            ->getQuery()
            ->setFirstResult($start)
            ->setMaxResults($limit)
            ->getResult();

        $count = $queryBuilder
            ->select('count('.$alias.".id)")
            ->getQuery()
            ->getScalarResult();

        return new SearchResult(new ArrayObject($result), (int)current(current($count)));
    }

    public function getColors()
    {
        $alias = 'p';

        $queryBuilder = $this->em->createQueryBuilder();

        $queryBuilder
            ->select($alias.".color")
            ->from(Product::class, $alias)
            ->groupBy($alias.".color");

        $result = $queryBuilder
            ->getQuery()
            ->getResult();

        return new ArrayObject($result);
    }
}
