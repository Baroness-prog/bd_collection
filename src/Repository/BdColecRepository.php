<?php

namespace App\Repository;

use App\Entity\BdColec;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BdColec|null find($id, $lockMode = null, $lockVersion = null)
 * @method BdColec|null findOneBy(array $criteria, array $orderBy = null)
 * @method BdColec[]    findAll()
 * @method BdColec[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BdColecRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BdColec::class);
    }

    // /**
    //  * @return BdColec[] Returns an array of BdColec objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BdColec
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
