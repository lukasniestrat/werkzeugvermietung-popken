<?php

declare(strict_types=1);

namespace App\Repository\Item;

use App\Entity\Item\Item;
use App\Model\Common\ModelList;
use App\Model\Common\RequestMetaData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Item>
 *
 * @method Item|null find($id, $lockMode = null, $lockVersion = null)
 * @method Item|null findOneBy(array $criteria, array $orderBy = null)
 * @method Item[]    findAll()
 * @method Item[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Item::class);
    }

    public function save(Item $item, bool $flush = false): Item
    {
        $this->getEntityManager()->persist($item);

        if ($flush) {
            $this->getEntityManager()->flush();
        }

        return $item;
    }

    public function remove(Item $item, bool $flush = false): Item
    {
        $this->getEntityManager()->remove($item);

        if ($flush) {
            $this->getEntityManager()->flush();
        }

        return $item;
    }

    public function getItems(RequestMetaData $requestMetaData): ModelList
    {
        $query = $this->getEntityManager()->createQueryBuilder()
            ->select('item')
            ->from(Item::class, 'item')
            ->setFirstResult($requestMetaData->getOffset())
            ->setMaxResults($requestMetaData->getLimit())
            ->addOrderBy('item.'.$requestMetaData->getOrderBy(), $requestMetaData->getOrderSequence())
            ->getQuery()
            ->setHydrationMode(AbstractQuery::HYDRATE_OBJECT);

        $paginator = new Paginator($query);
        $paginator->setUseOutputWalkers(false);

        $result = $paginator->getIterator()->getArrayCopy();
        $requestMetaData->setTotal($paginator->count());

        return new ModelList($result, $requestMetaData);
    }

    public function getItemById(int $id): Item
    {
        $item = $this->getEntityManager()
            ->getRepository(Item::class)
            ->find($id);

        if (null === $item) {
            throw new ItemException(ItemException::NOT_FOUND, ['reason' => sprintf('no item with id %s found', $id)]);
        }

        return $item;
    }
}
