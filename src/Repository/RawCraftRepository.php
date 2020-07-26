<?php

namespace App\Repository;

use App\Entity\RawCraft;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RawCraft|null find($id, $lockMode = null, $lockVersion = null)
 * @method RawCraft|null findOneBy(array $criteria, array $orderBy = null)
 * @method RawCraft[]    findAll()
 * @method RawCraft[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RawCraftRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RawCraft::class);
    }

    // /**
    //  * @return RawCraft[] Returns an array of RawCraft objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RawCraft
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
