<?php

namespace App\Repository;

use App\Entity\Boardgame;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Boardgame>
 */
class BoardgameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Boardgame::class);
    }
    public function saveBoardgame(Boardgame $boardgame): void
    {
        $this->getEntityManager()->persist($boardgame);
        $this->getEntityManager()->flush();
    }
    public function removeBoardgame(Boardgame $boardgame): void
    {
        $this->getEntityManager()->remove($boardgame);
        $this->getEntityManager()->flush();
    }

    //    /**
    //     * @return Boardgame[] Returns an array of Boardgame objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('b.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Boardgame
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
